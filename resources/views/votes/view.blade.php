@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')

    <div class="w-100">
        <div class="mb-3">
            <a href="{{ route('votes.create') }}" class="btn btn-primary">Crea</a>
        </div>

        <div class="accordion" id="votesAccordion">
            @foreach($votes as $vote)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $vote->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $vote->id }}" aria-expanded="false" aria-controls="collapse{{ $vote->id }}">
                            <div class="w-100 d-flex justify-content-between">
                                <span>ID: {{ $vote->id }}</span>
                                <span>Game: {{ $vote->match->name ?? 'N/A' }}</span> <!-- Assuming match has a name -->
                                <span>Vote Number: {{ $vote->vote_number }}</span>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $vote->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $vote->id }}" data-bs-parent="#votesAccordion">
                        <div class="accordion-body">
                            <!-- Display the vote details -->
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Player Name</th>
                                    <th>Player Image</th>
                                    <th>Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vote->match->players as $player) <!-- Load all players in this match -->
                                <tr>
                                    <td>{{ $player->name }}</td>
                                    <td>
                                        @if($player->image)
                                            <img src="{{ $player->image }}" width="50" height="50" alt="{{ $player->name }}">
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" width="50" height="50" alt="No Image">
                                        @endif
                                    </td>
                                    <td>{{ $player->score ?? 'N/A' }}</td> <!-- Assuming the player model has a score -->
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-100">
            {{ $votes->links() }}
        </div>
    </div>

@stop
