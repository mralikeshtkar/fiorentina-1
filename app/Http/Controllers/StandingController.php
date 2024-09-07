<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standing;
use App\Models\Matches;
use App\Models\Calendario;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use GuzzleHttp\Client;
// sportmonks B0lZqWEdqBzEPrLW5gDcm87Svgb5bnEEa807fd7kOiONHbcbetXywqPQafqC

class StandingController extends Controller
{
    public static function fetchStandingsIfNeeded()
    {
        $latestUpdate = Standing::latest('updated_at')->first();

        // Check if the data was updated within the last 20 hours
        if (!$latestUpdate || $latestUpdate->updated_at <= Carbon::now()->subHours(20)) {


            Standing::truncate();

            $response = Http::withHeaders([
                'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
            ])->get('http://api.football-data.org/v4/competitions/SA/standings');

            $standings = $response->json()['standings'][0]['table']; // Adjust depending on the actual JSON structure

            foreach ($standings as $standing) {
                Standing::updateOrCreate(
                    ['team_id' => $standing['team']['id']], // Assuming team_id is unique and consistent
                    [
                        'position' => $standing['position'],
                        'team_name' => $standing['team']['name'],
                        'short_name' => $standing['team']['shortName'],
                        'tla' => $standing['team']['tla'],
                        'crest_url' => $standing['team']['crest'],
                        'played_games' => $standing['playedGames'],
                        'form' => $standing['form'],
                        'won' => $standing['won'],
                        'draw' => $standing['draw'],
                        'lost' => $standing['lost'],
                        'points' => $standing['points'],
                        'goals_for' => $standing['goalsFor'],
                        'goals_against' => $standing['goalsAgainst'],
                        'goal_difference' => $standing['goalDifference']
                    ]
                );
            }
            return "Standings updated successfully.";
        }

        return "No update needed.";
    }

    public static function fetchScheduledMatches()
    {
        $latestUpdate = Matches::where('status', 'TIMED')->latest('updated_at')->first();
        if (!$latestUpdate || $latestUpdate->updated_at <= Carbon::now()->subHours(20)) {
        $response = Http::withHeaders([
            'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
        ])->get('https://api.football-data.org/v4/teams/99/matches', [
            'status' => 'SCHEDULED'
        ]);

        $matches = $response->json()['matches'];

        // Check if there is at least one match and only process the first one
        if (!empty($matches)) {
            $match = $matches[0];  // Get the first match
            $matchDate = Carbon::parse($match['utcDate'])->format('Y-m-d H:i:s');
            Matches::updateOrCreate(
                ['match_id' => $match['id']],
                [
                    'venue' => $match['venue'] ?? null,
                    'matchday' => $match['matchday'],
                    'stage' => $match['stage'],
                    'group' => $match['group'] ?? null,
                    'match_date' => $matchDate,  // Use the formatted date
                    'status' => $match['status'],
                    'home_team' => json_encode($match['homeTeam'] ?? []),
                    'away_team' => json_encode($match['awayTeam'] ?? []),
                    'score' => json_encode($match['score'] ?? []),
                    'goals' => !empty($match['goals']) ? json_encode($match['goals']) : null,
                    'penalties' => !empty($match['penalties']) ? json_encode($match['penalties']) : null,
                    'bookings' => !empty($match['bookings']) ? json_encode($match['bookings']) : null,
                    'substitutions' => !empty($match['substitutions']) ? json_encode($match['substitutions']) : null,
                    'odds' => !empty($match['odds']) ? json_encode($match['odds']) : null,
                    'referees' => !empty($match['referees']) ? json_encode($match['referees']) : null,
                ]
            );
            return "First timed match updated successfully.";
        }
        }
        return "No update needed or no matches found.";
        
    }

    public static function fetchFinishedMatches()
    {
        $latestUpdate = Matches::where('status','FINISHED')->latest('updated_at')->first();
        if (!$latestUpdate || $latestUpdate->updated_at <= Carbon::now()->subHours(20)) {
            $response = Http::withHeaders([
                'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
            ])->get('https://api.football-data.org/v4/teams/99/matches', [
                'status' => 'FINISHED'
            ]);
    
            $matches = $response->json()['matches'];
    
            foreach ($matches as $match) {
                Matches::updateOrCreate(
                    ['match_id' => $match['id']],
                    [
                        'venue' => $match['venue'],
                        'matchday' => $match['matchday'],
                        'stage' => $match['stage'],
                        'group' => $match['group'],
                        'match_date' => $match['utcDate'],
                        'status' => $match['status'],
                        'home_team' => json_encode($match['homeTeam']),
                        'away_team' => json_encode($match['awayTeam']),
                        'score' => json_encode($match['score']),
                        'goals' => json_encode($match['goals']),
                        'penalties' => json_encode($match['penalties']),
                        'bookings' => json_encode($match['bookings']),
                        'substitutions' => json_encode($match['substitutions']),
                        'odds' => json_encode($match['odds']),
                        'referees' => json_encode($match['referees']),
                    ]
                );
            }
            return "Matches updated successfully.";
        }
            return "No update needed.";
        
    }






    private function saveMatchToDb($match_id, $match_date, $home_team, $away_team)
    {
        // Convert match_date to appropriate format if needed (e.g., using Carbon)
        // Adjust database fields accordingly based on your table structure
        dd($match_id, $match_date, $home_team, $away_team);
       
    }



    public static function FetchCalendario()
    {
        $latestUpdate = Matches::where('status', 'TIMED')->latest('updated_at')->first();
        // if (!$latestUpdate || $latestUpdate->updated_at <= Carbon::now()->subHours(20)) {
        if (1) {
            $htmlContent = $dom->saveHTML(); // Load your actual HTML content here

            // Step 2: Load the HTML into DOMDocument
            $dom = new DOMDocument();
            libxml_use_internal_errors(true); // Suppress parsing errors for invalid HTML
            $dom->loadHTML($htmlContent);
            libxml_clear_errors(); // Clear any parsing errors
    
            // Step 3: Create a DOMXPath instance for querying the HTML
            $xpath = new DOMXPath($dom);
    
            // Step 4: Query for the specific div element by its id
            // You can use the XPath query to target the div with the id "g_1_zFWqD4KM"
            $divNode = $xpath->query("//div[@id='g_1_zFWqD4KM']");
    
            // Step 5: Extract the content of the matched div element
            if ($divNode->length > 0) {
                $divHtml = $dom->saveHTML($divNode->item(0)); // Get the HTML content of the div
    
                // Output the extracted div for debugging (you can process or store it as needed)
                dd($divHtml); // Dump the extracted div content for inspection
            } else {
                dd('Div not found'); // Div with the specified id was not found
            }

        // Step 4: Iterate through all the match nodes and extract relevant data
        foreach ($matchNodes as $matchNode) {
            // Extract match ID (if it's in an attribute, e.g., id="match123")
            $match_id = $matchNode->getAttribute('id');

            // Extract match date (adjust the XPath expression based on actual HTML)
            $match_date = $xpath->query(".//div[contains(@class, 'event__time')]", $matchNode)->item(0)->textContent;

            // Extract home team name
            $home_team = $xpath->query(".//div[contains(@class, 'event__participant--home')]", $matchNode)->item(0)->textContent;

            // Extract away team name
            $away_team = $xpath->query(".//div[contains(@class, 'event__participant--away')]", $matchNode)->item(0)->textContent;

            // Store the match data in the array
            $matches[] = [
                'match_id' => $match_id,
                'match_date' => $match_date,
                'home_team' => $home_team,
                'away_team' => $away_team,
            ];

            // Optional: Output the home team for debugging
            dd($home_team);
        }
                    


        

            // $response = Http::withHeaders([
            //     "x-rapidapi-host" => 'flashlive-sports.p.rapidapi.com',
            //     "x-rapidapi-key" => '1e9b76550emshc710802be81e3fcp1a0226jsn069e6c35a2bb'
            // ])->get('https://flashlive-sports.p.rapidapi.com/v1/tournaments/list?sport_id=1&locale=en_INT');
            // // Filter the response data where COUNTRY_NAME is "Italy" or "Italia"
            // $filteredData = collect($response->json()['DATA'])->filter(function ($item) {
            //     return in_array($item['COUNTRY_NAME'], ['Italy', 'Italia']);
            // });

            // Dump the filtered data
        // $response = Http::withHeaders([
        //     'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
        // ])->get('https://api.football-data.org/v4/teams/99/matches');

        
        // $matches = $response->json()['matches'];

        // Check if there is at least one match and only process the first one
        // if (!empty($matches)) {
        //     foreach($matches as $match){
        //         $matchDate = Carbon::parse($match['utcDate'])->format('Y-m-d H:i:s');
        //         Calendario::updateOrCreate(
        //             ['match_id' => $match['id']],
        //             [
        //                 'venue' => $match['venue'] ?? null,
        //                 'matchday' => $match['matchday'],
        //                 'competition' => $match['competition']['emblem'],
        //                 'group' => $match['competition']['name'] ?? null,
        //                 'match_date' => $matchDate,  // Use the formatted date
        //                 'status' => $match['status'],
        //                 'home_team' => json_encode($match['homeTeam'] ?? []),
        //                 'away_team' => json_encode($match['awayTeam'] ?? []),
        //                 'score' => json_encode($match['score'] ?? []),
        //                 'goals' => !empty($match['goals']) ? json_encode($match['goals']) : null,
        //                 'penalties' => !empty($match['penalties']) ? json_encode($match['penalties']) : null,
        //                 'bookings' => !empty($match['bookings']) ? json_encode($match['bookings']) : null,
        //                 'substitutions' => !empty($match['substitutions']) ? json_encode($match['substitutions']) : null,
        //                 'odds' => !empty($match['odds']) ? json_encode($match['odds']) : null,
        //                 'referees' => !empty($match['referees']) ? json_encode($match['referees']) : null,
        //             ]
        //         );
        //     } // Get the first match
            
        //     return "First timed match updated successfully.";
        // }
        }
        return "No update needed or no matches found.";
        
    }





}
    
