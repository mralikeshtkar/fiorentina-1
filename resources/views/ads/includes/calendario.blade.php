
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
                        $updateMessage = App\Http\Controllers\StandingController::fetchStandingsIfNeeded();
                        $updateScheduledMessage = App\Http\Controllers\StandingController::fetchScheduledMatches();
                    @endphp
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Match ID</th>
                        <th>Venue</th>
                        <th>Matchday</th>
                        <th>Stage</th>
                        <th>Group</th>
                        <th>Match Date</th>
                        <th>Status</th>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th>Score</th>
                        <th>Odds</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach (App\Models\Matches::all() as $match)
                        @php
                            // Decode the JSON fields
                            $homeTeam = json_decode($match->home_team, true);
                            $awayTeam = json_decode($match->away_team, true);
                            $score = json_decode($match->score, true);
                            $odds = json_decode($match->odds, true);
                        @endphp
                        <tr>
                            <td>{{ $match->id }}</td>
                            <td>{{ $match->match_id }}</td>
                            <td>{{ $match->venue ?? 'N/A' }}</td>
                            <td>{{ $match->matchday }}</td>
                            <td>{{ $match->stage }}</td>
                            <td>{{ $match->group ?? 'N/A' }}</td>
                            <td>{{ $match->match_date }}</td>
                            <td>{{ $match->status }}</td>
                            <td>
                                {{ $homeTeam['name'] }} ({{ $homeTeam['shortName'] }})
                                <img src="{{ $homeTeam['crest'] }}" alt="{{ $homeTeam['shortName'] }}" style="width: 30px; height: auto;">
                            </td>
                            <td>
                                {{ $awayTeam['name'] }} ({{ $awayTeam['shortName'] }})
                                <img src="{{ $awayTeam['crest'] }}" alt="{{ $awayTeam['shortName'] }}" style="width: 30px; height: auto;">
                            </td>
                            <td>
                                Full Time: {{ $score['fullTime']['home'] ?? '-' }} - {{ $score['fullTime']['away'] ?? '-' }} <br>
                                Half Time: {{ $score['halfTime']['home'] ?? '-' }} - {{ $score['halfTime']['away'] ?? '-' }}
                            </td>
                            <td>{{ $odds['msg'] ?? 'N/A' }}</td>
                            <td>{{ $match->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </section>
        </div>
    </div>

