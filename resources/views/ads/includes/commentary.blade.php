@php
    use Illuminate\Support\Str;
@endphp
<div class="container mt-3">
    @foreach ($commentaries as $comment)
        <div
            class="commentary-row {{ $comment['comment_class'] }} {{ $comment['is_important'] ? 'important' : '' }}{{ $comment['is_bold'] ? 'comment-is-bold' : '' }}">
            <div class="comment-time" style="flex: 0.5">{{ $comment['comment_time'] }}</div>
            <div style="flex: 0.5">
                @if (Str::contains(request()->url(), '/diretta/view'))
                    <a style="margin-right: 5px" href="/delete-commentary?id={{ $comment->id }}"><i class="text-danger fa-solid fa-trash"></i></a>
                    <a href="/modify-commentary?id={{ $comment->id }}"><i
                            class="text-white fa-solid fa-pen-to-square"></i></i></a>
                @endif
            </div>
            <div class="comment-icon"></div>
            <div class="comment-text {{ $comment['is_bold'] ? 'comment-bold' : '' }}">{{ $comment['comment_text'] }}
            </div>
        </div>
    @endforeach
</div>
