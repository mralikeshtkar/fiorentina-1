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
                <th>Titolo</th>
                <th>Modalità</th>
                <th>Stato</th>
                <th>Numero di video</th>
                <th>Ritardo</th>
                <th>Azioni</th>

            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr>
                    <td class="align-middle">{{ $video->id }}</td>
                    <td class="align-middle">{{ $video->title }}</td>
                    <td class="align-middle">{{ $video->getModelLabel() }}</td>
                    <td class="align-middle">{{ $video->getStatusLabel() }}</td>
                    <td class="align-middle">{{ $video->media_files_count }}</td>
                    <td class="align-middle">{{ $video->delay }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('videos.edit',$video->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('videos.destroy',$video->id) }}" method="post">
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
