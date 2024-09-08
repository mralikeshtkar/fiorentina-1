<?php
namespace App\Http\Controllers;

use App\Models\MatchLineups;
use App\Models\Calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class MatchLineupsController extends Controller
{
    private static  function getLineup($matchId){

        $match=Calendario::where('match_id',$matchId)->first();
        $homeTeam = json_decode($match->home_team, true);
        $isHomeFiorentina =
        $homeTeam['name'] == 'Fiorentina' ||
        $homeTeam['name'] == 'Fiorentina (Ita)' ||
        $homeTeam['name'] == 'Fiorentina (Ita) *';
        $url="https://flashlive-sports.p.rapidapi.com/v1/events/lineups?locale=it_IT&event_id={$matchId}";
        $response = Http::withHeaders([
            "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
            "x-rapidapi-key" => '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb'
        ])->get($url);

        // Extract the data from the response
        $data = $response->json()['DATA'];
        if($isHomeFiorentina){
            $coachData=$data[2]['FORMATIONS'][0];
            $subsData=$data[1]['FORMATIONS'][0];
            $initialData=$data[0]['FORMATIONS'][0];
        }else{
            $coachData=$data[2]['FORMATIONS'][1];
            $subsData=$data[1]['FORMATIONS'][1];
            $initialData=$data[0]['FORMATIONS'][1];
        }

        return [
            'Coach'=>$coachData,
            'Sub'=>$subsData,
            'Initial'=>$initialData,
        ];
        

    }

    public static function storeLineups($matchId)
    {
        $match=MatchLineups::where('match_id',$matchId)->first();
        if(!$match){
            $data=MatchLineupsController::getLineup($matchId);
            foreach ($data as $category) {
                dd($category);
                foreach ($category['MEMBERS'] as $player) {
                    MatchLineups::updateOrCreate(
                        [
                            'match_id' => $matchId,
                            'player_id' => $player['PLAYER_ID']
                        ],
                        [
                            'formation_name' => $category['FORMATION_NAME'],
                            'formation_disposition' => $category['FORMATION_DISPOSTION'] ?? null,
                            'player_full_name' => $player['PLAYER_FULL_NAME'],
                            'player_position' => $player['PLAYER_POSITION'] ?? null,
                            'player_number' => $player['PLAYER_NUMBER'] ?? null,
                            'player_country' => $player['PLAYER_COUNTRY'],
                            'player_rating' => $player['LPR'] ?? null,
                            'short_name' => $player['SHORT_NAME'],
                            'player_image' => "https://static.flashscore.com/res/image/data/{$player['LPI']}"
                        ]
                    );
                }
            }
        }
        

        return response()->json(['success' => 'Lineups saved successfully']);
    }
}
