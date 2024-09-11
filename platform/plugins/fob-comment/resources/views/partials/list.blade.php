@php
    $currentIndent ??= 0;

    if (! view()->exists($paginationView = Theme::getThemeNamespace('partials.pagination'))) {
        $paginationView = 'pagination::bootstrap-5';
    }
@endphp

<div class="comment-list">
    @foreach($comments as $comment)
        @continue(! $comment->is_approved && $comment->ip_address !== request()->ip())

        <div id="comment-{{ $comment->getKey() }}" class="comment-item">
            <div class="comment-item-inner">
                <div class="comment-item-avatar">
                    @if ($comment->website)
                        <a href="{{ $comment->website }}" target="_blank">
                            <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}">
                        </a>
                    @else
                        <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}">
                    @endif
                </div>
                <div class="comment-item-content">
                    <div class="comment-item-info">
                        @if ($comment->website)
                            <a href="{{ $comment->website }}" class="comment-item-author" target="_blank">
                                <h4>{{ $comment->name }}</h4>
                            </a>
                        @else
                            <h4>{{ $comment->name }}</h4>
                        @endif
                        <span class="comment-item-date">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="comment-item-body">
                        @if (! $comment->is_approved)
                            <em class="comment-item-pending">
                                {{ trans('plugins/fob-comment::comment.front.list.waiting_for_approval_message') }}
                            </em>
                        @endif
                        <p>{{ $comment->formatted_content }}</p>
                    </div>

                    <div class="comment-item-footer">
                        <span class="comment-reactions">
                            <i class="fa fa-thumbs-up"></i> 0
                            <i class="fa fa-thumbs-down"></i> 0
                        </span>
                        @if ($comment->is_approved)
                            <a href="{{ route('fob-comment.public.comments.reply', $comment) }}" class="comment-item-reply">
                                <i class="fa fa-reply"></i> {{ trans('plugins/fob-comment::comment.front.list.reply') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            @if ($comment->replies->count())
                <div class="comment-replies">
                    @include('plugins/fob-comment::partials.list', [
                        'comments' => $comment->replies,
                        'currentIndent' => $currentIndent + 1,
                    ])
                </div>
            @endif
        </div>
    @endforeach
</div>

@if ($comments instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $comments->hasPages())
    <div class="comment-pagination">
        {{ $comments->appends(request()->except('page'))->links($paginationView) }}
    </div>
@endif
