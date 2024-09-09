@php
    // Get the initial lineup and the formation disposition
    $formationInitiali = $groupedLineups['Formazioni iniziali']; // The array of players
    $formationInitiali = $formationInitiali->sortBy('player_position');

    $formationDisposition = $formationInitiali->first()->formation_disposition; // Get formation like '1-3-4-2-1'

    // Split the formation into an array, e.g. [1, 3, 4, 2, 1]
    $formationArray = explode('-', $formationDisposition);

    // Initialize an empty array to hold the rows of players
    $playerRows = [];

    $currentIndex = 0; // To track the index of players

    // Loop through the formation array to create the rows dynamically
    foreach ($formationArray as $numPlayers) {
        // Assign the correct number of players to each row
        $playerRows[] = $formationInitiali->slice($currentIndex, $numPlayers);
        $currentIndex += $numPlayers;
    }
    $playerRows = array_reverse($playerRows);

@endphp
<div class="football-pitch">
    <div class="pitch-lines"></div>
    <div class="halfway-line"></div>

    <!-- Penalty areas -->
    <div class="penalty-area-top"></div>
    <div class="penalty-area-bottom"></div>

    <!-- Small boxes inside the penalty areas -->
    <div class="small-box-top"></div>
    <div class="small-box-bottom"></div>

    <div class="container">
        <!-- Display Formation Header -->
        <div class="row">
            <div class="col-12">
                <h2 class="pl-5 text-dark text-bold">Formazioni Iniziali</h2>
                <p class="pl-5 text-dark text-bold">Formation: {{ $formationDisposition }}</p>
            </div>
        </div>

        <!-- Loop through each row (group of players) in the formation and display the players -->
        @foreach ($playerRows as $row)
            <div class="row justify-content-around mb-4">
                @foreach ($row as $player)
                    <div class="col-2 text-center">
                        <div class="player-container">
                            <div class="player-lineup">
                                <img class="player-lineup-img" src="{{ $player->player_image }}"
                                    alt="{{ $player->player_full_name }}" width="50">
                                <div class="rating"
                                    @if ($player->player_rating >= 7.0) style='background-color: #1dc231;'
                                @elseif ($player->player_rating <= 6.1)
                                    style='background-color: #c21d1d;' @endif>

                                    {{ $player->player_rating }}</div>
                                <p class="player-name">{{ $player->short_name }}</p>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endforeach
    </div>


    @php
        $panchina = $groupedLineups['Panchina'];
        $Allenatori = $groupedLineups['Allenatori'];
    @endphp


</div>
<table class="table table-responsive">

    <tbody>
        @foreach ($panchina as $panchinaPlayer)
            <tr>
                <td><img src="{{ $panchinaPlayer->player_image }}" alt="{{ $panchinaPlayer->player_full_name }}"
                        width="50" class="mr-20">{{ $panchinaPlayer->short_name }}

                    <span class="rating"
                        @if ($panchinaPlayer->player_rating >= 7.0) style="background-color: #1dc231;"
                         @elseif ($panchinaPlayer->player_rating <= 6.1) style="background-color: #c21d1d;" @endif>
                        {{ $panchinaPlayer->player_rating }}
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
