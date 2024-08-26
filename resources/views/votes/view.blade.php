@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')

    <div class="w-100">
        <div class="mb-3">
            <a href="{{ route('votes.create') }}" class="btn btn-primary">Create</a>
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
            @foreach($votes as $vote)
                <tr>
                    <td class="align-middle">{{ $vote->id }}</td>
                    <td class="align-middle">{{ $vote->player->name }}</td>
                    <td class="align-middle">
                        @if($vote->getImageUrl($vote->player->name))
                            <img src="{{ $vote->getImageUrl($vote->player->name) }}" width="30" height="30" alt="{{ $vote->title }}">
                        @endif
                    </td>

                    <td class="align-middle">{{ $vote->vote_number }}</td>
                    <td class="align-middle">{{ $vote->created_at }}</td>
                    <td class="align-middle">{{ $vote->updated_at }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('votes.edit', $vote->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('votes.destroy', $vote->id) }}" method="post">
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
            {{ $votes->links() }}
        </div>
    </div>

@stop
