@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="container">
        <h1>Create a New Poll</h1>
        <form method="POST" action="{{ route('polls.store') }}">
            @csrf
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            <div class="form-group" id="options-container">
                <label for="options">Options</label>
                <input type="text" class="form-control mb-2" name="options[]" required>
                <input type="text" class="form-control mb-2" name="options[]" required>
            </div>
            <button type="button" class="btn btn-secondary mb-3" onclick="addOption()">Add another option</button>
            <button type="submit" class="btn btn-primary">Create Poll</button>
        </form>
    </div>

    <script>
        function addOption() {
            const container = document.getElementById('options-container');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'options[]';
            input.required = true;
            input.classList.add('form-control', 'mb-2');
            container.appendChild(input);
        }
    </script>
@endsection
