@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h1>Existing Polls</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Options Count</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polls as $poll)
                    <tr>
                        <td>{{ $poll->question }}</td>
                        <td>{{ $poll->options->count() }}</td>
                        <td>{{ $poll->active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('polls.toggle', $poll->id) }}" class="btn btn-sm btn-secondary">Toggle
                                Active</a>
                            <a href="{{ route('polls.export', $poll->id) }}" class="btn btn-sm btn-success">Export</a>
                            <a href="{{ route('polls.edit', $poll->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('polls.destroy', $poll->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $polls->links() }}
    </div>
@endsection
