<?php

namespace App\Http\Controllers;

use App\Models\LiveChat;
use App\Models\Message;
use Illuminate\Http\Request;


class ChatController extends Controller
{
    public function fetchMessages($matchId)
    {

        self::createChatIfNotExists($matchId);

        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if (!$liveChat || $liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }

        return $liveChat->match->messages()->with('member')->get();
    }

    public function sendMessage(Request $request, $matchId)
    {
        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if (!$liveChat || $liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }

        // Create message directly using the Message model
        $message = Message::create([
            'user_id' => auth()->id(),  // Manually set the user ID
            'message' => $request->message,
            'match_id' => $matchId
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
