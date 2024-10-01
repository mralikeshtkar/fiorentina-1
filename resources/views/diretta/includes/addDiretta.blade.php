<form action="" method="POST">
    @csrf
    <!-- Time Input -->
    <div>
        <label for="time">Time</label>
        <input type="number" id="time" name="time" required>
    </div>

    <!-- Tipo di Event Select -->
    <div>
        <label for="tipo_event">Tipo di Event</label>
        <select id="tipo_event" name="tipo_event" required>
            <option value="event1">Event 1</option>
            <option value="event2">Event 2</option>
            <option value="event3">Event 3</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <!-- Comment Text Area -->
    <div>
        <label for="comment_text">Comment Text</label>
        <textarea id="comment_text" name="comment_text" rows="4" required></textarea>
    </div>

    <!-- Radio Buttons -->
    <div>
        <label>
            <input type="radio" name="style" value="bold" required>
            Bold
        </label>
        <label>
            <input type="radio" name="style" value="important" required>
            Important
        </label>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
