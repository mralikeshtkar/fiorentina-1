<?php

namespace App\Http\Controllers;

use App\Models\MatchCommentary;
use App\Models\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatchCommentaryController extends Controller
{
    public static function storeCommentaries($matchId)
{
    // Fetch match commentary count from the database
    $match = Calendario::where('match_id',$matchId)->first();
    $existingCommentaryCount = $match->commentary_count;
    $apiKey = '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb';
    // Simulate fetching data from an API, replace with your actual API request logic
    $url = "https://flashlive-sports.p.rapidapi.com/v1/events/commentary?locale=it_IT&event_id={$matchId}";
    $response = Http::withHeaders([
        "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
        "x-rapidapi-key" => $apiKey
    ])->get($url);

    // Assuming the response returns the data in the format provided
    $data = $response->json()['DATA'];
    $newCommentaryCount = count($data);

    // If there are new commentaries (newCommentaryCount > existingCommentaryCount)
    if ($newCommentaryCount > $existingCommentaryCount) {
        // Calculate how many new items to insert
        $newItems = array_slice($data, $existingCommentaryCount); // Get only the new items

        foreach ($newItems as $comment) {
            // Add the new commentary to the database
            MatchCommentary::updateOrCreate(
                [
                    'match_id' => $matchId,
                    'comment_time' => $comment['COMMENT_TIME'] ?? NULL,
                    'comment_class' => $comment['COMMENT_CLASS'] ?? NULL,
                    'comment_text' => $comment['COMMENT_TEXT'] ?? NULL,
                    'is_bold' => $comment['COMMENT_IS_BOLD'] ?? NULL
                ],
                [
                    'is_important' => $comment['COMMENT_IS_IMPORTANT'] ?? 0,
                ]
            );
        }

        // Update the commentary count in the Match model
        $match->commentary_count = $newCommentaryCount;
        $match->save();
    }

    return response()->json(['success' => 'New match commentaries saved successfully!']);
}


    public static function liveComments($matchId)
    {

    }
}
