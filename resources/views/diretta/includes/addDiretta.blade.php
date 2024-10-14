@php
    use App\Models\MatchCommentary;

    $uniqueCommentClasses = MatchCommentary::select('comment_class')->distinct()->pluck('comment_class');

@endphp
<form action="" method="POST" class="p-3">
    @csrf
    <div class="row mb-3">
        <!-- Time Input -->
        <div class="col-md-2">
            <label for="time" class="form-label">Time</label>
            <input type="number" id="time" name="time" class="form-control" required>
        </div>

        <!-- Tipo di Event Select -->
        <div class="col-md-4">
            <label for="tipo_event" class="form-label">Tipo di Event</label>
            <select id="tipo_event" name="tipo_event" class="form-select" required>
                <option value="" disabled selected>Select Event</option>
                @foreach ($uniqueCommentClasses as $comment_class)
                    <option value="{{ $comment_class }}">{{ $comment_class }}</option>
                @endforeach
                <!-- Add more options as needed -->
            </select>
        </div>
    </div>

    <!-- Comment Text Area -->
    <div class="mb-3">
        <label for="comment_text" class="form-label">Comment Text</label>
        <textarea id="comment_text" name="comment_text" rows="4" class="form-control" required></textarea>
    </div>

    <!-- Radio Buttons -->
    <div class="mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="style" id="bold" value="bold" required>
            <label class="form-check-label" for="bold">Bold</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="style" id="important" value="important" required>
            <label class="form-check-label" for="important">Important</label>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@include('ads.includes.commentary', ['commentaries' => $commentaries])
