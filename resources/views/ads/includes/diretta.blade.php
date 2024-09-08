{{-- Live One here  --}}
@php
    use App\Models\Matches;
    use App\Models\MatchLineups;
    use App\Http\Controllers\MatchLineupsController;
    $matchId = request()->query('match_id');
    if ($matchId) {
        $match = Matches::where('match_id', $matchId)->first();
        MatchLineupsController::storeLineups($matchId);
        // Filter the lineups by formation_name
        $lineups = MatchLineups::where('match_id', $matchId)->get();
        $groupedLineups = $lineups->groupBy('formation_name')->only(['Panchina', 'Allenatori', 'Formazioni iniziali']);

        dd($groupedLineups);
    }
@endphp

{{-- Diretta History blade --}}
