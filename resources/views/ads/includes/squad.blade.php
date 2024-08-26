@php
    use App\Models\Player;
    $players=Player:all();
    $forwards = $players->where('position', 'Attaccante');
    $Midfielders = $players->where('position', 'Centrocampista');
    $Defenders = $players->where('position', 'Difensore');
    $Goalkeepers = $players->where('position', 'Portiere');
    $stindex=0;
@endphp
<div class="pitch">
    <div class="player gk">Baxter</div>
    <div class="player cb">Tomori</div>
    <div class="player cb2">Zouma</div>
    <div class="player lb">Dasilva</div>
    <div class="player rb">James</div>
    <div class="player dm">Chalobah</div>
    <div class="player cm">Mount</div>
    <div class="player cm2">Bakayoko</div>
    <div class="player lw">Kenedy</div>
    <div class="player rw">Pulisic</div>
    <div class="forwards">

        @foreach ($forwads as $st )
        <div class="player st{{ $stindex }}">{{ $st->name }}</div>
        @php
            $stindex++;
        @endphp
        @endforeach
    </div>
</div>
