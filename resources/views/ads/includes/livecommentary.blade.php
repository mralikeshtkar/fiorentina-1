@php
    use App\Models\MatchCommentary;
    use App\Http\Controllers\MatchCommentaryController;
    MatchCommentaryController::storeCommentaries($matchId); // Store new commentaries every reload
    $commentaries = MatchCommentary::where('match_id', $matchId)
        ->orderBy('comment_time', 'asc') // You can also use 'desc' for reverse order
        ->get();
@endphp

<!-- Refresh the page every 15 seconds -->
<meta http-equiv="refresh" content="15">

<div class="container mt-3">
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
