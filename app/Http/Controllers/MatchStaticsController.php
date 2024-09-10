<?php

namespace App\Http\Controllers;

use App\Models\MatchStatics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatchStaticsController extends Controller
{
    public static function storeMatchStatistics($matchId)
    {
        $match=MatchStatics::where('match_id',$matchId)->first();
        if(!$match){
            // Simulate fetching data from an API, replace with your actual API request logic
            $url="https://flashlive-sports.p.rapidapi.com/v1/events/statistics?event_id={$matchId}&locale=it_IT";
            $response = Http::withHeaders([
                "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
                "x-rapidapi-key" => '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb'
            ])->get($url);        
            // Assuming the response returns the data in the format provided
            $data = $response->json()['DATA'];

            // Loop through each stage and save the statistics
            foreach ($data as $stage) {
                $stageName = $stage['STAGE_NAME'];

                foreach ($stage['GROUPS'] as $group) {
                    $groupLabel = $group['GROUP_LABEL'];

                    foreach ($group['ITEMS'] as $item) {
                        MatchStatistics::updateOrCreate(
                            [
                                'match_id' => $matchId,
                                'stage_name' => $stageName,
                                'group_label' => $groupLabel,
                                'incident_name' => $item['INCIDENT_NAME']
                            ],
                            [
                                'value_home' => $item['VALUE_HOME'],
                                'value_away' => $item['VALUE_AWAY']
                            ]
                        );
                    }
                }
            }

        }
        

        return response()->json(['success' => 'Match statistics saved successfully!']);
    }
}
