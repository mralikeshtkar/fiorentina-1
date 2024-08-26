@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')

    <div class="w-100">
        <div class="mb-3">
            <a href="{{ route('players.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Player Name</th>
                <th>Player Image</th>
                <th>Vote Number</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr>
                    <td class="align-middle">{{ $player->id }}</td>
                    <td class="align-middle">{{ $player->name }}</td>
                    <td class="align-middle">
                        @if($player->getImageUrl($player->name))
                            <img src="{{ $player->getImageUrl($player->name) }}" width="50" height="50" alt="{{ $player->title }}">
                        @endif
                    </td>

                    <td class="align-middle">{{ $player->vote_number }}</td>
                    <td class="align-middle">{{ $player->created_at }}</td>
                    <td class="align-middle">{{ $player->updated_at }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="w-100">
            {{ $players->links() }}
        </div>
    </div>

@stop
