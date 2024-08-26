@php
    use App\Models\Player;
    $players = Player::all();
    $forwards = $players->where('position', 'Attaccante');
    $Midfielders = $players->where('position', 'Centrocampista');
    $Defenders = $players->where('position', 'Difensore');
    $Goalkeepers = $players->where('position', 'Portiere');
@endphp
<div class="container">
    <div class="row">
        <!-- Goalkeepers -->
        <div class="col-md-3 player-list">
            <h3>Goalkeepers</h3>
            <ul>
                @foreach ($goalkeepers as $gk)
                    <li>{{ $gk->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Defenders -->
        <div class="col-md-3 player-list">
            <h3>Defenders</h3>
            <ul>
                @foreach ($defenders as $df)
                    <li>{{ $df->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Midfielders -->
        <div class="col-md-3 player-list">
            <h3>Midfielders</h3>
            <ul>
                @foreach ($midfielders as $mf)
                    <li>{{ $mf->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Forwards -->
        <div class="col-md-3 player-list">
            <h3>Forwards</h3>
            <ul>
                @foreach ($forwards as $fw)
                    <li>{{ $fw->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
