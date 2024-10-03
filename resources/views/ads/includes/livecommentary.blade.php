@php
    use App\Http\Controllers\MatchCommentaryController;
@endphp

<div class="container mt-3" id="commentary-container">
    @foreach ($commentaries as $comment)
        <div
            class="commentary-row {{ $comment['comment_class'] }} {{ $comment['is_important'] ? 'important' : '' }}{{ $comment['is_bold'] ? 'comment-is-bold' : '' }}">
            <div class="comment-time">{{ $comment['comment_time'] }}</div>
            <div class="comment-icon"></div>
            <div class="comment-text {{ $comment['is_bold'] ? 'comment-bold' : '' }}">{{ $comment['comment_text'] }}
            </div>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var matchId = "{{ $matchId }}"; // Pass the match ID from the Blade
        var interval = 15000; // 15 seconds

        // Function to fetch latest commentaries
        function fetchCommentaries() {
            fetch('/match/' + matchId + '/commentaries')
                .then(response => response.json())
                .then(data => {
                    updateCommentaries(data);
                })
                .catch(error => {
                    console.error('Error fetching commentaries:', error);
                });
        }

        // Function to update the commentary section with new data
        function updateCommentaries(commentaries) {
            var container = document.getElementById('commentary-container');
            container.innerHTML = ''; // Clear existing commentaries

            commentaries.forEach(function(comment) {
                var commentRow = `
                    <div class="commentary-row ${comment.comment_class} ${comment.is_important ? 'important' : ''} ${comment.is_bold ? 'comment-is-bold' : ''}">
                        <div class="comment-time">${comment.comment_time || ''}</div>
                        <div class="comment-icon"></div>
                        <div class="comment-text ${comment.is_bold ? 'comment-bold' : ''}">${comment.comment_text || ''}</div>
                    </div>
                `;
                container.innerHTML += commentRow;
            });
        }

        // Initial fetch
        fetchCommentaries();

        // Periodically fetch new commentaries every 15 seconds
        setInterval(fetchCommentaries, interval);
    });
</script>
