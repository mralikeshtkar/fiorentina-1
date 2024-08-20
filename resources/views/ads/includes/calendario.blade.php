
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


                        @dd($match)

                    </tbody>
                </table>
            </section>
        </div>
    </div>

