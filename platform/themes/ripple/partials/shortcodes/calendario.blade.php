@include('ads.includes.calendario')
@php
    $match = App\Models\Calendario::where('status', 'SCHEDULED')
        ->orWhere('status', 'LIVE')
        ->orderBy('match_date', 'desc')
        ->first();
    $home_team = json_decode($match->home_team, true);
    $away_team = json_decode($match->away_team, true);

@endphp

<div class="container mb-3">
    <div class="row align-items-center upcoming-match">
        <!-- Match Date, Time, and Venue -->
        <div class="col-md-3">
            <p>{{ ucwords(\Carbon\Carbon::parse($match->match_date)->locale('it')->timezone('Europe/Rome')->isoFormat('dddd D MMMM [ore] H:mm')," \t\r\n\f\v") }}
            </p>
        </div>

        <!-- Team Logos and Names -->
        <div class="col-md-6 text-center">
            <div class="row">
                <div class="col-6">
                    <img src="{{ $home_team['logo'] }}" alt="{{ $home_team['name'] }} Crest"
                        style="height: 30px; margin-bottom: 10px;">
                    <h5>{{ $home_team['name'] }}</h5>
                </div>
                <div class="col-6">
                    <img src="{{ $away_team['crest'] }}" alt="{{ $away_team['name'] }} Crest"
                        style="height: 30px; margin-bottom: 10px;">
                    <h5>{{ $away_team['name'] }}</h5>
                </div>
            </div>
        </div>

        <!-- Ticket Buttons -->
        <div class="col-md-3">
            <div class="d-grid">
                <a href="https://laviola.collaudo.biz/diretta?match_id={{ $match->match_id }}"
                    class="btn-sm btn-primary mb-2 fiorentina-btn" style="grid-area: auto;">Vai alla
                    diretta!</a>
            </div>
        </div>
    </div>
</div>
