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
@endphp

<div class="container">
    <!-- Display Formation Header -->
    <div class="row">
        <div class="col-12">
            <h2>Formazioni Iniziali</h2>
            <p>Formation: {{ $formationDisposition }}</p>
        </div>
    </div>

    <!-- Loop through each row (group of players) in the formation and display the players -->
    @foreach ($playerRows as $row)
        <div class="row justify-content-around mb-4">
            @foreach ($row as $player)
                <div class="col-2 text-center">
                    <img src="{{ $player->player_image }}" alt="{{ $player->player_full_name }}" width="50">
                    <p>{{ $player->player_full_name }}</p>
                    <p>Rating: {{ $player->player_rating }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
