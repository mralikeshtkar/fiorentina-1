@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')

    <div class="w-100">
        <div class="mb-3">
            <a href="{{ route('videos.create') }}" class="btn btn-primary">Crea</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>type</th>
                <th>group</th>
                <th>image</th>

                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr>
                    <td class="align-middle">{{ $video->id }}</td>
                    <td class="align-middle">{{ $video->title }}</td>
                    <td class="align-middle">{{ $video->type }}</td>
                    <td class="align-middle">{{ $video->group_name }}</td>
                    <td class="align-middle">
{{--                        @if($video->getImageUrl())--}}
{{--                            <img src="{{ $video->getImageUrl() }}" width="140" alt="{{ $video->title }}">--}}
{{--                        @endif--}}
                    </td>



                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('ads.edit',$video->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('ads.destroy',$video->id) }}" method="post">
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
            {{ $videos->links() }}
        </div>
    </div>

@stop
