<?php

namespace App\Http\Controllers;

use App\Models\LiveChat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Botble\Member\Models\Member;
use Illuminate\Support\Facades\Http;





class ChatController extends Controller
{
    public function fetchMessages($matchId)
    {
        // Ensure the chat exists or create it if not
        $liveChat = LiveChat::firstOrCreate(
            ['match_id' => $matchId],
            ['chat_status' => 'live'] // Default status to 'live' if creating a new chat
        );
    
        // If the chat is finished, return an error
        if ($liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }
    
        // If the chat was just created, create a welcome message from user_id = 1
        if ($liveChat->wasRecentlyCreated) {
            Message::create([
                'match_id' => $matchId,
                'user_id' => 1, // Admin user
                'message' => 'La chat è iniziata! Si prega di rispettare le regole, essere gentili e cortesi.'
            ]);
        }
    
        // Fetch all messages by match_id using the Message model
        $messages = Message::where('match_id', $matchId)->get();
    
        // Load associated members (users) for each message
        foreach ($messages as $message) {
            $message->member = Member::find($message->user_id);
        }
    
        // Return messages and an alert that the chat has started
        return response()->json([
            'alert' => [
                'type' => 'success',
                'message' => 'La chat è iniziata! Si prega di rispettare le regole, essere gentili e cortesi.'
            ],
            'messages' => $messages
        ]);
    }


    private function censorBadWords($message)
{
    $apiUrl = 'https://neutrinoapi.net/bad-word-filter';
    $apiUser = env('NEUTRINO_API_USER');
    $apiKey = env('NEUTRINO_API_KEY');

    // List of light words you want to censor manually
    $light = [
        "bastardo","bastardi","bastarda","bastarde","bernarda","bischero","bischera","bocchino",
        "bordello","cacare","cacarella","cagare","cagata","cagate","caghetta","cagone","cazzata",
        "cazzo","cazzi","cazzone","cazzoni","cazzona","cesso","ciucciata","cogliona","coglione","cristo",
        "cretina","cretino","culattone","culattona","culo","culone","culona","culoni","deficiente",
        "dio","figa","fighe","fottuta","fottuto","frocio","frocione","frocetto","gesu","imbecille",
        "imbecilli","incazzare","incazzato","incazzati","madonna","maronna","merda","merdina",
        "merdona","merdaccia","mignotta","mignottona","mignottone","mortacci","negro","negra",
        "pippa","pippona","pippone","pippaccia","pirla","pompino","porco","puttana","puttanona",
        "puttanone","puttaniere","puttanate","rompiballe","rompipalle","rompicoglioni","scazzi",
        "scemo","scopare","scopata","stronzata","stronzo","stronzone","troia","troione","trombata",
        "vaffanculo","zoccola","zoccolona"
    ];

    // Censor the "light" words manually, leaving the first and last letters visible
    $lowercaseMessage = strtolower($message);
    foreach ($light as $badWord) {
        // Censor everything except the first and last letter of the bad word
        $badWordPattern = '/\b' . $badWord . '\b/i'; // Case-insensitive exact match of the word
        $censoredWord = substr($badWord, 0, 1) . str_repeat('*', strlen($badWord) - 2) . substr($badWord, -1);
        $lowercaseMessage = preg_replace($badWordPattern, $censoredWord, $lowercaseMessage);
    }

    // Send the censored message (after manual censoring) to NeutrinoAPI for further processing
    $response = Http::post($apiUrl, [
        'user-id' => $apiUser,
        'api-key' => $apiKey,
        'content' => $lowercaseMessage, // Pass the already partially censored message
        'censor-character' => '*' // This will replace any remaining bad words with asterisks
    ]);

    if ($response->successful()) {
        // Return the final censored message (NeutrinoAPI + manual light word censoring)
        return $response->json()['censored-content'];
    }

    // In case of failure, return the manually censored message
    return $lowercaseMessage;
}

    


    public function sendMessage(Request $request, $matchId)
{
    $liveChat = LiveChat::where('match_id', $matchId)->first();

    if (!$liveChat || $liveChat->isFinished()) {
        return response()->json(['error' => 'Chat is finished'], 403);
    }

    // Get the message from the request
    $messageContent = $request->message;

    // Censor bad words in the message
    $censoredMessage = $this->censorBadWords($messageContent);

    // Create the message with the censored content
    $message = Message::create([
        'user_id' => auth('member')->id(),  // Manually set the user ID
        'message' => $censoredMessage,
        'match_id' => $matchId,
    ]);

    // Broadcast the message to others
    broadcast(new MessageSent($message))->toOthers();

    return response()->json(['message' => 'Message sent successfully', 'censored_message' => $censoredMessage], 200);
}


    public static function updateChatStatus($matchId, $status)
    {
        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if ($liveChat) {
            $liveChat->update(['chat_status' => $status]);
            return response()->json(['status' => 'Chat status updated!']);
        }

        return response()->json(['error' => 'Live chat not found'], 404);
    }



        // Static function to create chat if it doesn't exist
        public static function createChatIfNotExists($matchId)
        {
            $liveChat = LiveChat::where('match_id', $matchId)->first();
    
            // Create the live chat if it does not exist
            if (!$liveChat) {
                LiveChat::create([
                    'match_id' => $matchId,
                    'chat_status' => 'live'  // Default status is 'live'
                ]);
            }
        }


        public function manage($matchId)
        {
            
        }
}
