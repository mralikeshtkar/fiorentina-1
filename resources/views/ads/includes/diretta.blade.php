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
                <img src="{{ $homeTeam['logo'] }}" alt="{{ $homeTeam['name'] }}">
                <span>{{ $homeTeam['name'] }}</span>
            </div>
            <div class="match-score">
                <div>{{ date('d.m.Y H:i', strtotime($match->match_date)) }}</div>
                <div>{{ $score['home'] }} - {{ $score['away'] }}</div>
                <div>FINALE</div>

            </div>
            <div class="team away-team">
                <img src="{{ $awayTeam['logo'] }}" alt="{{ $awayTeam['name'] }}">
                <span>{{ $awayTeam['name'] }}</span>
            </div>
        </div>
    </div>
@endif

{{-- Diretta History blade --}}
