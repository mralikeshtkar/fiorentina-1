@php
    use Carbon\Carbon;
@endphp
<div class="col-lg-12 mx-auto">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="page-sidebar mt-3">
        <section>
            <div class="page-content">
                <div class="post-group">
                    <div class="post-group__header">
                        <h3 class="post-group__title">Calendario Fiorentina</h3>
                    </div>
                </div>
            </div>



            @php
                $updateScheduledMessage = App\Http\Controllers\StandingController::fetchCalendario();
            @endphp


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

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
                                @foreach ($matches = App\Models\Calendario::orderBy('match_date', 'asc')->get() as $match)
                                    @php
                                        $homeTeam = json_decode($match->home_team, true);
                                        $awayTeam = json_decode($match->away_team, true);
                                        $score = json_decode($match->score, true);
                                        $odds = json_decode($match->odds, true);
                                    @endphp
                                    <tr>
                                        <td>
                                            @php
                                                Carbon::setLocale('it'); // Set the locale to Italian
                                                $formattedDate = Carbon::parse($match->match_date)->translatedFormat(
                                                    'd F Y',
                                                );
                                            @endphp
                                            {{ $formattedDate }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="{{ $homeTeam['logo'] }}"
                                                        alt="{{ $homeTeam['shortname'] }}"
                                                        style="width: 20px; height: auto;">
                                                    <span
                                                        @if ($score['away'] < $score['home']) style='font-weight:bold' @endif>
                                                        {{ $homeTeam['name'] }}
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <img src="{{ $awayTeam['logo'] }}"
                                                        alt="{{ $awayTeam['shortname'] }}"
                                                        style="width: 20px; height: auto;">
                                                    <span
                                                        @if ($score['away'] > $score['home']) style='font-weight:bold' @endif>
                                                        {{ $awayTeam['name'] }}
                                                    </span>

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($match->status != 'SCHEDULED')
                                                <span>
                                                    {{ $score['home'] ?? '-' }} -
                                                    {{ $score['away'] ?? '-' }}
                                                </span>

                                                <span>
                                                    @if (($homeTeam['name'] == 'Fiorentina' || $awayTeam['name'] == 'Fiorentina (Ita)') && $score['home'] > $score['away'])
                                                        <span
                                                            class="badge badge-pill badge-success p-1 font-weight-bold">
                                                            V </span>
                                                    @elseif ($score['home'] == $score['away'])
                                                        <span
                                                            class="badge badge-pill badge-warning p-1 font-weight-bold">
                                                            N </span>
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-danger p-1 font-weight-bold">
                                                            P </span>
                                                    @endif
                                                </span>
                                            @else
                                                @php
                                                    $time = Carbon::parse($match->match_date)->format('H:i');
                                                    if ($time == '00:00') {
                                                        $time = 'Da Confermare';
                                                    }
                                                @endphp
                                                {{ $time }}
                                            @endif

                                        </td>
                                        <td>
                                            <img src="{{ $match->competition }}" alt="{{ $match->group }}"
                                                style="width: 30px; height: auto;">
                                            {{ $match->group }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>
