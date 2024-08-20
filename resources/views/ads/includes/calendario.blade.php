
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
                <table class="table table-sm table-striped">
                    <thead
                        style="
                            background: blueviolet;
                            border: 1px solid white;
                            color: white;
                            font-weight: 900;
                        ">
                    <tr>
                        <th style="border-right: 1px solid white;"></th>
                        <th style="border-right: 1px solid white;">PT</th>
                        <th style="border-right: 1px solid white;">G</th>
                        <th style="border-right: 1px solid white;">V</th>
                        <th style="border-right: 1px solid white;">N</th>
                        <th style="border-right: 1px solid white;">P</th>
                        <th>DR</th>
                    </tr>
                    </thead>
                    <tbody
                        style="
                            background: white;
                            border: 1px solid white;
                        ">

                    @foreach (App\Models\Standing::all() as $standing)
                        @dd($standing)
                        <tr style="border-bottom:1px solid blueviolet">
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;" @endif
                            style="border-right: 1px solid blueviolet;"><img
                                    src="{{ $standing->crest_url }}" width="15">
                                {{ $standing->short_name }}</td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="border-right: 1px solid blueviolet;">{{ $standing->points }}</td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="border-right: 1px solid blueviolet;text-align:center">
                                {{ $standing->played_games }}
                            </td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="border-right: 1px solid blueviolet;text-align:center">
                                {{ $standing->won }}</td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="border-right: 1px solid blueviolet;text-align:center">
                                {{ $standing->draw }}</td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="border-right: 1px solid blueviolet;text-align:center">
                                {{ $standing->lost }}</td>
                            <td @if ($standing->short_name == 'Fiorentina') style="background-color:#8a2be270 !important;text-align:center" @endif
                            style="text-align:center">{{ $standing->goal_difference }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>

