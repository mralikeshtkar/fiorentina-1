@php
    // use controller

    // get last comment(if last saved comment was 30seconds then check if last change key wasn't the same and then get the last key and save it into db)
       
@endphp

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
