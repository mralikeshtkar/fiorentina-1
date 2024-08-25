<div class="col-lg-12 mx-auto">

    <div class="page-sidebar mt-3">
        <section>
            <div class="page-content">
                <div class="post-group">
                    <div class="post-group__header">
                        <h3 class="post-group__title">Calendario Fiorentina</h3>
                    </div>
                </div>
            </div>


            <div>
                @php
                    $updateScheduledMessage = App\Http\Controllers\StandingController::fetchCalendario();
                @endphp
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Match</th>
                        <th>Orario/Risultati</th>
                        <th>Campionato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Calendario::all() as $match)
                        @php
                            $homeTeam = json_decode($match->home_team, true);
                            $awayTeam = json_decode($match->away_team, true);
                            $score = json_decode($match->score, true);
                            $odds = json_decode($match->odds, true);
                        @endphp
                        <tr>
                            <td>{{ $match->match_date }}</td>
                            <td>{{ $match->status }}</td>
                            <td>
                                {{ $homeTeam['name'] }}
                                <img src="{{ $homeTeam['crest'] }}" alt="{{ $homeTeam['shortName'] }}"
                                    style="width: 30px; height: auto;">
                            </td>
                            <td>
                                {{ $awayTeam['name'] }}
                                <img src="{{ $awayTeam['crest'] }}" alt="{{ $awayTeam['shortName'] }}"
                                    style="width: 30px; height: auto;">
                            </td>
                            <td>
                                Full Time: {{ $score['fullTime']['home'] ?? '-' }} -
                                {{ $score['fullTime']['away'] ?? '-' }}
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
    </div>
</div>
