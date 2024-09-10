<?php

namespace App\Http\Controllers;

use App\Models\MatchCommentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatchCommentaryController extends Controller
{
    public static function storeCommentaries($matchId)
    {
        $match=MatchCommentary::where('match_id',$matchId)->first();
        if(!$match){
            // Simulate fetching data from an API, replace with your actual API request logic
            $url="https://flashlive-sports.p.rapidapi.com/v1/events/commentary?locale=it_IT&event_id={$matchId}";
            $response = Http::withHeaders([
                "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
                "x-rapidapi-key" => '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb'
            ])->get($url);        
            // Assuming the response returns the data in the format provided
            $data = $response->json()['DATA'];

            foreach ($data as $comment) {
                MatchCommentary::updateOrCreate(
                    [
                        'match_id' => $matchId,
                        'comment_time' => $comment['COMMENT_TIME'],
                        'comment_class' => $comment['COMMENT_CLASS'],
                        'comment_text' => $comment['COMMENT_TEXT'],
                        'is_bold' => $comment['COMMENT_TEXT'] ?? 0
                    ],
                    [
                        'is_important' => $comment['COMMENT_IS_IMPORTANT'] ?? 0,
                    ]
                );
            }

        }
        

        return response()->json(['success' => 'Match statistics saved successfully!']);
    }

    public static function liveComments($matchId)
    {

    }
}
