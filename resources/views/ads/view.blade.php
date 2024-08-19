@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')

    <div class="w-100">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ads as $ad)
                <tr>
                    <td class="align-middle">{{ $ad->id }}</td>
                    <td class="align-middle">{{ $ad->title }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-2">
                            <a href="{{ route('ads.edit',$ad->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('ads.destroy',$ad->id) }}" method="post">
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
            {{ $ads->links() }}
        </div>
    </div>

@stop
