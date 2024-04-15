<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('match_id')->unique();
            $table->string('venue')->nullable();
            $table->integer('matchday');
            $table->string('stage');
            $table->string('group')->nullable();
            $table->dateTime('match_date');
            $table->string('status');
            $table->json('home_team')->nullable();  // Stores JSON data for the home team
            $table->json('away_team')->nullable();  // Stores JSON data for the away team
            $table->json('score')->nullable();      // Stores JSON data for scores
            $table->json('goals')->nullable();      // Stores an array of goals as JSON
            $table->json('penalties')->nullable();  // Stores penalty details as JSON
            $table->json('bookings')->nullable();   // Stores bookings details as JSON
            $table->json('substitutions')->nullable();  // Stores substitutions as JSON
            $table->json('odds')->nullable();       // Stores odds details as JSON
            $table->json('referees')->nullable();   // Stores referees details as JSON
            $table->timestamps();
        });
        
        
    }


    public static function fetchScheduledMatches()
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
        ])->get('https://api.football-data.org/v4/teams/99/matches', [
            'status' => 'SCHEDULED'
        ]);

        $matches = $response->json()['matches'];

        foreach ($matches as $match) {
            \App\Models\Match::updateOrCreate(
                ['match_id' => $match['id']], // Assuming match_id is unique
                [
                    'home_team_id' => $match['homeTeam']['id'],
                    'home_team_name' => $match['homeTeam']['name'],
                    'away_team_id' => $match['awayTeam']['id'],
                    'away_team_name' => $match['awayTeam']['name'],
                    'match_date' => Carbon::parse($match['utcDate']), // Convert UTC date to a Carbon instance
                    'status' => $match['status']
                ]
            );
        }
        return "Scheduled matches updated successfully.";
    }

    public static function fetchFinishedMatches()
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => 'e1ef65752c2b42c2b8002bccec730215'
        ])->get('https://api.football-data.org/v4/teams/99/matches', [
            'status' => 'FINISHED'
        ]);

        $matches = $response->json()['matches'];

        foreach ($matches as $match) {
            \App\Models\Match::updateOrCreate(
                ['match_id' => $match['id']], // Assuming match_id is unique
                [
                    'home_team_id' => $match['homeTeam']['id'],
                    'home_team_name' => $match['homeTeam']['name'],
                    'away_team_id' => $match['awayTeam']['id'],
                    'away_team_name' => $match['awayTeam']['name'],
                    'match_date' => Carbon::parse($match['utcDate']), // Convert UTC date to a Carbon instance
                    'status' => $match['status']
                ]
            );
        }
        return "Scheduled matches updated successfully.";
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
