<?php

namespace App\Http\Controllers;

use App\Models\MatchSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatchSummaryController extends Controller
{
    public static function storeMatchSummary($matchId)
    {
        // Replace this with the actual API call
        $response = Http::get('your-api-endpoint-for-match-summary');
        $data = $response->json()['DATA'];

        foreach ($data as $stage) {
            foreach ($stage['ITEMS'] as $item) {
                // Gather participants as a JSON structure
                $incidentParticipants = [];
                foreach ($item['INCIDENT_PARTICIPANTS'] as $participant) {
                    $incidentParticipants[] = [
                        'participant_name' => $participant['PARTICIPANT_NAME'] ?? null,
                        'participant_id' => $participant['PARTICIPANT_ID'] ?? null,
                        'incident_type' => $participant['INCIDENT_TYPE'] ?? null,
                        'incident_name' => $participant['INCIDENT_NAME'] ?? null,
                        'home_score' => $participant['HOME_SCORE'] ?? null,
                        'away_score' => $participant['AWAY_SCORE'] ?? null,
                    ];
                }

                // Save to the database
                MatchSummary::updateOrCreate(
                    [
                        'match_id' => $matchId,
                        'incident_id' => $item['INCIDENT_ID'],
                    ],
                    [
                        'stage_name' => $stage['STAGE_NAME'],
                        'incident_team' => $item['INCIDENT_TEAM'],
                        'incident_time' => $item['INCIDENT_TIME'],
                        'incident_type' => $item['INCIDENT_TYPE'],
                        'incident_participants' => json_encode($incidentParticipants),
                        'result_home' => $stage['RESULT_HOME'] ?? null,
                        'result_away' => $stage['RESULT_AWAY'] ?? null,
                    ]
                );
            }
        }

        return response()->json(['success' => 'Match summary saved successfully.']);
    }

    public function showMatchSummary($matchId)
    {
        $matchSummary = MatchSummary::where('match_id', $matchId)->get();

        return view('match.summary', compact('matchSummary'));
    }
}
