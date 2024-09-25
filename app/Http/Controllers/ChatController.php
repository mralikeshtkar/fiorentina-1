<?php

namespace App\Http\Controllers;

use App\Models\LiveChat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use Botble\Member\Models\Member;




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

    public function sendMessage(Request $request, $matchId)
    {
        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if (!$liveChat || $liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }

    // Create message directly using the Message model
        $message = Message::create([
            'user_id' => auth('member')->id(),  // Manually set the user ID
            'message' => $request->message,
            'match_id' => $matchId,
        ]);




        broadcast(new MessageSent($message))->toOthers();

        return ['status' => 'Message Sent!'];
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
}
