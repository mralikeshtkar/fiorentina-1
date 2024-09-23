{{-- Live One here  --}}
@php
    use App\Models\Calendario;
    use App\Models\MatchLineups;
    use App\Models\MatchStatics;
    use App\Models\MatchCommentary;
    use App\Models\MatchSummary;
    use App\Http\Controllers\MatchLineupsController;
    use App\Http\Controllers\MatchStaticsController;
    use App\Http\Controllers\MatchCommentaryController;
    use App\Http\Controllers\MatchSummaryController;
    $matchId = request()->query('match_id');
    if ($matchId) {
        $match = Calendario::where('match_id', $matchId)->first();

        MatchStaticsController::storeMatchStatistics($matchId);
        MatchLineupsController::storeLineups($matchId);
        MatchCommentaryController::storeCommentaries($matchId);
        MatchSummaryController::storeMatchSummary($matchId);

        $lineups = MatchLineups::where('match_id', $matchId)->get();
        $statics = MatchStatics::where('match_id', $matchId)->get();
        $commentaries = MatchCommentary::where('match_id', $matchId)->get();
        $summaries = MatchSummary::where('match_id', $matchId)->get();

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

        $isHomeFiorentina =
            $homeTeam['name'] == 'Fiorentina' ||
            $homeTeam['name'] == 'Fiorentina (Ita)' ||
            $homeTeam['name'] == 'Fiorentina (Ita) *';
        $isAwayFiorentina =
            $awayTeam['name'] == 'Fiorentina' ||
            $awayTeam['name'] == 'Fiorentina (Ita)' ||
            $awayTeam['name'] == 'Fiorentina (Ita) *';

    @endphp
    <div class="match-details mt-5">
        <div class="team-logos">
            <div class="team home-team">
                <img src="{{ $homeTeam['logo'] }}" alt="{{ $homeTeam['name'] }}">
                <span>{{ $homeTeam['name'] }}</span>
            </div>
            <div class="match-score">
                <h6>{{ date('d.m.Y H:i', strtotime($match->match_date)) }}</h6>
                <div>{{ $score['home'] }} - {{ $score['away'] }}</div>
                <h6>FINALE</h6>

            </div>
            <div class="team away-team">
                <img src="{{ $awayTeam['logo'] }}" alt="{{ $awayTeam['name'] }}">
                <span>{{ $awayTeam['name'] }}</span>
            </div>
        </div>
    </div>


    <!-- Tab Navigation -->
    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="formazioni-tab" data-toggle="tab" href="#formazioni" role="tab"
                aria-controls="formazioni" aria-selected="false">FORMAZIONI</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link" id="riassunto-tab" data-toggle="tab" href="#riassunto" role="tab"
                aria-controls="riassunto" aria-selected="true">RIASSUNTO</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="statistiche-tab" data-toggle="tab" href="#statistiche" role="tab"
                aria-controls="statistiche" aria-selected="false">STATISTICHE</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link" id="commento-tab" data-toggle="tab" href="#commento" role="tab"
                aria-controls="commento" aria-selected="false">COMMENTO</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active text-dark" id="formazioni" role="tabpanel"
            aria-labelledby="formazioni-tab">
            @include('ads.includes.formazioni', ['groupedLineups' => $groupedLineups])
        </div>
        <div class="tab-pane fade" id="riassunto" role="tabpanel" aria-labelledby="riassunto-tab">
            @include('ads.includes.riassunto', ['summaries' => $summaries])

        </div>
        <div class="tab-pane fade" id="statistiche" role="tabpanel" aria-labelledby="statistiche-tab">
            @include('ads.includes.statistiche', [
                'statics' => $statics,
                'isHomeFiorentina',
                $isHomeFiorentina,
            ])
        </div>

        <div class="tab-pane fade" id="commento" role="tabpanel" aria-labelledby="commento-tab">
            @if ($match->status == 'LIVE')
                @include('ads.includes.livecommentary')
            @else
                @include('ads.includes.commentary', ['commentaries' => $commentaries])
            @endif

        </div>
    </div>
@endif

{{-- Diretta History blade --}}
