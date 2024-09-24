<?php

use App\Models\LiveChat;
use App\Models\Message;

class ChatController extends Controller
{
    public function fetchMessages($matchId)
    {
        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if (!$liveChat || $liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }

        return $liveChat->match->messages()->with('user')->get();
    }

    public function sendMessage(Request $request, $matchId)
    {
        $liveChat = LiveChat::where('match_id', $matchId)->first();

        if (!$liveChat || $liveChat->isFinished()) {
            return response()->json(['error' => 'Chat is finished'], 403);
        }

        $message = auth()->user()->messages()->create([
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
}
