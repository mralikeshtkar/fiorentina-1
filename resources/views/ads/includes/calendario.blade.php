@php
    use Carbon\Carbon;
@endphp
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


            <script>
                document.getElementById('scoreIframe').onload = function() {
                    var iframeDoc = document.getElementById('scoreIframe').contentWindow.document;

                    // Remove specific elements
                    var elementsToRemove = [
                        "#rccontent",
                        "#box-over-content-split",
                        ".container__heading",
                        ".otPlaceholder",
                        ".seoAdWrapper",
                        ".menuTop--soccer",
                        ".header",
                        ".container__myMenu",
                        "#lsmpb"
                    ];

                    elementsToRemove.forEach(function(selector) {
                        var elements = iframeDoc.querySelectorAll(selector);
                        elements.forEach(function(el) {
                            el.parentNode.removeChild(el);
                        });
                    });
                };
            </script>

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
                                @foreach (App\Models\Calendario::all() as $match)
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
                                                    <img src="{{ $homeTeam['crest'] }}"
                                                        alt="{{ $homeTeam['shortName'] }}"
                                                        style="width: 20px; height: auto;">
                                                    {{ $homeTeam['name'] }}
                                                </div>
                                                <div class="col-6">
                                                    <img src="{{ $awayTeam['crest'] }}"
                                                        alt="{{ $awayTeam['shortName'] }}"
                                                        style="width: 20px; height: auto;">
                                                    {{ $awayTeam['name'] }}

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($score['fullTime']['home'])
                                                Full Time: {{ $score['fullTime']['home'] ?? '-' }} -
                                                {{ $score['fullTime']['away'] ?? '-' }}
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
