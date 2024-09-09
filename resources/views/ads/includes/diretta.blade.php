{{-- Live One here  --}}
@php
    use App\Models\Calendario;
    use App\Models\MatchLineups;
    use App\Http\Controllers\MatchLineupsController;
    $matchId = request()->query('match_id');
    if ($matchId) {
        $match = Calendario::where('match_id', $matchId)->first();
        MatchLineupsController::storeLineups($matchId);
        // Filter the lineups by formation_name
        $lineups = MatchLineups::where('match_id', $matchId)->get();
        $groupedLineups = $lineups
            ->filter(function ($lineup) {
                return in_array($lineup->formation_name, ['Panchina', 'Allenatori', 'Formazioni iniziali']);
            })
            ->groupBy('formation_name');
    }
@endphp


@if ($match)
    @php
        $homeTeam = json_decode($match->home_team, true);
        $awayTeam = json_decode($match->away_team, true);
        $score = json_decode($match->score, true);
        $odds = json_decode($match->odds, true);
    @endphp
    <div class="match-details">
        <div class="team-logos">
            <div class="team home-team">
                <img src="{{ $match->home_team['logo'] }}" alt="{{ $match->home_team['name'] }}">
                <span>{{ $match->home_team['name'] }}</span>
            </div>
            <div class="match-score">
                <span>{{ $match->score['fullTime']['home'] }} - {{ $match->score['fullTime']['away'] }}</span>
                <span>FINALE</span>
                <span>{{ date('d.m.Y H:i', strtotime($match->match_date)) }}</span>
            </div>
            <div class="team away-team">
                <img src="{{ $match->away_team['logo'] }}" alt="{{ $match->away_team['name'] }}">
                <span>{{ $match->away_team['name'] }}</span>
            </div>
        </div>
    </div>
@endif

{{-- Diretta History blade --}}
