@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')

    <div class="w-100">
        <div class="mb-3">
            <a href="{{ route('votes.create') }}" class="btn btn-primary">Crea</a>
        </div>

        <div class="accordion" id="votesAccordion">
            @foreach( $votes as $vote)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $vote->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $vote->id }}" aria-expanded="false" aria-controls="collapse{{ $vote->id }}">
                            <div class="w-100 d-flex justify-content-between">
                                <span>ID: {{ $vote->id }}</span>
                                <span>Game: {{ $vote->match_id }}</span>

                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $vote->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $vote->id }}" data-bs-parent="#votesAccordion">
                        <div class="accordion-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Player Name</th>
                                    <th>Player Image</th>
                                    <th>Vote Number</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $vote->player->name }}</td>
                                    <td>
                                        @if( $vote->getImageUrl( $vote->name))
                                            <img src="{{ $vote->getImageUrl( $vote->name) }}" width="50" height="50" alt="{{ $vote->name }}">
                                        @endif
                                    </td>
                                    <td>{{ $vote->vote_number }}</td>
                                    <td>{{ $vote->created_at }}</td>
                                    <td>{{ $vote->updated_at }}</td>
                                </tr>
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

{{--@extends(BaseHelper::getAdminMasterLayoutTemplate())--}}

{{--@section('content')--}}

{{--    <div class="w-100">--}}
{{--        <div class="mb-3">--}}
{{--            <a href="{{ route('votes.create') }}" class="btn btn-primary">Crea</a>--}}
{{--        </div>--}}
{{--        <table class="table table-striped">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>game Name</th>--}}
{{--                <th>player Name</th>--}}
{{--                <th>Player Image</th>--}}
{{--                <th>Vote Number</th>--}}
{{--                <th>Created At</th>--}}
{{--                <th>Updated At</th>--}}
{{--                <th>Actions</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach( $votes as $vote)--}}
{{--                <tr>--}}
{{--                    <td class="align-middle">{{ $vote->id }}</td>--}}

{{--                    <td class="align-middle">{{ $vote->match_id }}</td>--}}
{{--                    <td class="align-middle">{{ $vote->name }}</td>--}}
{{--                    <td class="align-middle">--}}
{{--                        @if( $vote->getImageUrl( $vote->name))--}}
{{--                            <img src="{{ $vote->getImageUrl( $vote->name) }}" width="50" height="50" alt="{{ $vote->name }}">--}}
{{--                        @endif--}}

{{--                    @if( $vote->getImageUrl())--}}
{{--                            <img src="{{ $vote->getImageUrl() }}" width="140" alt="{{ $vote->title }}">--}}
{{--                        @endif--}}
{{--                        @if( $vote->getImageUrl( $vote->player->name))--}}
{{--                            <img src="{{ $vote->getImageUrl( $vote->player->name) }}" width="50" height="50" alt="{{ $vote->title }}">--}}
{{--                        @endif--}}
{{--                    </td>--}}

{{--                    <td class="align-middle">{{ $vote->vote_number }}</td>--}}
{{--                    <td class="align-middle">{{ $vote->created_at }}</td>--}}
{{--                    <td class="align-middle">{{ $vote->updated_at }}</td>--}}
{{--                    <td class="align-middle">--}}
{{--                        <div class="d-flex gap-2">--}}
{{--                            <a href="{{ route('votes.edit', $vote->id) }}" class="btn btn-primary">Edit</a>--}}
{{--                            <form action="{{ route('votes.destroy', $vote->id) }}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        <div class="w-100">--}}
{{--            {{ $votes->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@stop--}}
