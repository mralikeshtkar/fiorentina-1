{{--@php--}}
{{--    $currentIndent ??= 0;--}}

{{--    if (!view()->exists($paginationView = Theme::getThemeNamespace('partials.pagination'))) {--}}
{{--        $paginationView = 'pagination::bootstrap-5';--}}
{{--    }--}}
{{--@endphp--}}

{{--<div class="fob-comment-list">--}}
{{--    @foreach ($comments as $comment)--}}
{{--        @continue(!$comment->is_approved && $comment->ip_address !== request()->ip())--}}

{{--        <div id="comment-{{ $comment->getKey() }}" class="fob-comment-item">--}}
{{--            <div class="fob-comment-item-inner"--}}
{{--                style="display: flex; align-items: flex-start; margin-bottom: 15px; border: 1px solid #e0e0e0; padding: 10px; border-radius: 8px;">--}}

{{--                <!-- Avatar -->--}}
{{--                <div class="fob-comment-item-avatar" style="flex-shrink: 0; margin-right: 10px;">--}}
{{--                    @if ($comment->website)--}}
{{--                        <a href="{{ $comment->website }}" target="_blank">--}}
{{--                            <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}"--}}
{{--                                style="width: 50px; height: 50px; border-radius: 50%;">--}}
{{--                        </a>--}}
{{--                    @else--}}
{{--                        <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}"--}}
{{--                            style="width: 50px; height: 50px; border-radius: 50%;">--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <!-- Comment Content -->--}}
{{--                <div class="fob-comment-item-content" style="flex-grow: 1;">--}}
{{--                    <div class="fob-comment-item-body" style="margin-bottom: 10px;">--}}
{{--                        @if (!$comment->is_approved)--}}
{{--                            <em class="fob-comment-item-pending" style="font-style: italic; color: #999;">--}}
{{--                                {{ trans('plugins/fob-comment::comment.front.list.waiting_for_approval_message') }}--}}
{{--                            </em>--}}
{{--                        @endif--}}

{{--                        <p>{{ $comment->formatted_content }}</p>--}}
{{--                    </div>--}}

{{--                    <!-- Footer with Author Info and Reply -->--}}
{{--                    <div class="fob-comment-item-footer"--}}
{{--                        style="display: flex; justify-content: space-between; align-items: center;">--}}
{{--                        <div class="fob-comment-item-info" style="font-size: 14px; color: #555;">--}}
{{--                            @if ($comment->is_admin)--}}
{{--                                <span class="fob-comment-item-admin-badge"--}}
{{--                                    style="background-color: #ffc107; padding: 3px 5px; border-radius: 3px; font-size: 12px; color: #fff;">--}}
{{--                                    {{ trans('plugins/fob-comment::comment.front.admin_badge') }}--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                            <h4 class="fob-comment-item-author"--}}
{{--                                style="display: inline; margin-right: 10px; font-size: 14px; color: #333; font-weight: bold;">--}}
{{--                                {{ $comment->name }}</h4>--}}
{{--                            <span class="fob-comment-item-date"--}}
{{--                                style="font-size: 12px; color: #999;">{{ $comment->created_at->diffForHumans() }}</span>--}}
{{--                        </div>--}}

{{--                        @if ($comment->is_approved)--}}
{{--                            <a href="{{ route('fob-comment.public.comments.reply', $comment) }}"--}}
{{--                                class="fob-comment-item-reply" data-comment-id="{{ $comment->getKey() }}"--}}
{{--                                data-reply-to="{{ $replyLabel = trans('plugins/fob-comment::comment.front.list.reply_to', ['name' => $comment->name]) }}"--}}
{{--                                data-cancel-reply="{{ trans('plugins/fob-comment::comment.front.list.cancel_reply') }}"--}}
{{--                                aria-label="{{ $replyLabel }}"--}}
{{--                                style="color: #007bff; text-decoration: none; font-size: 12px;">--}}
{{--                                {{ trans('plugins/fob-comment::comment.front.list.reply') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Nested Comments (Replies) -->--}}
{{--            @if ($comment->replies->count())--}}
{{--                <div style="margin-left: {{ 20 * $currentIndent }}px;">--}}
{{--                    @include('plugins/fob-comment::partials.list', [--}}
{{--                        'comments' => $comment->replies,--}}
{{--                        'currentIndent' => $currentIndent + 1,--}}
{{--                    ])--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

{{--<!-- Pagination -->--}}
{{--@if ($comments instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $comments->hasPages())--}}
{{--    <div class="fob-comment-pagination" style="text-align: center;">--}}
{{--        {{ $comments->appends(request()->except('page'))->links($paginationView) }}--}}
{{--    </div>--}}
{{--@endif--}}
@php
    // Default pagination view setup if the theme pagination view is not available.
    $currentIndent ??= 0;

    if (! view()->exists($paginationView = Theme::getThemeNamespace('partials.pagination'))) {
        $paginationView = 'pagination::bootstrap-5';
    }
@endphp

<div class="fob-comment-list">
    @foreach($comments as $comment)
        @continue(! $comment->is_approved && $comment->ip_address !== request()->ip())

        <div id="comment-{{ $comment->getKey() }}" class="comment-item">
            <div class="comment-item-inner">
                <!-- Avatar section -->
                <div class="comment-item-avatar">
                    @if ($comment->website)
                        <a href="{{ $comment->website }}" target="_blank">
                            <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}">
                        </a>
                    @else
                        <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}">
                    @endif
                </div>

                <!-- Comment content -->
                <div class="comment-item-content">
                    <div class="comment-item-body">
                        @if (! $comment->is_approved)
                            <em class="comment-item-pending">
                                {{ __('Your comment is awaiting approval') }}
                            </em>
                        @endif

                        <!-- Comment content -->
                        @if($comment->is_admin)
                            {!! clean($comment->formatted_content) !!}
                        @else
                            <p>{{ $comment->formatted_content }}</p>
                        @endif
                    </div>

                    <!-- Footer with author, date, and reply link -->
                    <div class="comment-item-footer">
                        <div class="comment-item-info">
                            @if($comment->is_admin)
                                <span class="comment-item-admin-badge">
                                    {{ __('Admin') }}
                                </span>
                            @endif
                            @if ($comment->website)
                                <a href="{{ $comment->website }}" class="comment-item-author" target="_blank">
                                    <h4 class="comment-item-author">{{ $comment->name }}</h4>
                                </a>
                            @else
                                <h4 class="comment-item-author">{{ $comment->name }}</h4>
                            @endif
                            <span class="comment-item-date">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>

                        <!-- Reply button -->
                        @if ($comment->is_approved)
                            <a
                                href="{{ route('comments.reply', $comment) }}"
                                class="comment-item-reply"
                                data-comment-id="{{ $comment->getKey() }}"
                                data-reply-to="{{ __('Reply to :name', ['name' => $comment->name]) }}"
                                data-cancel-reply="{{ __('Cancel reply') }}"
                                aria-label="{{ __('Reply to :name', ['name' => $comment->name]) }}"
                            >
                                {{ __('Reply') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Nested replies -->
            @if ($comment->replies->count())
                @include('partials.comment-list', [
                    'comments' => $comment->replies,
                    'currentIndent' => $currentIndent + 1,
                ])
            @endif
        </div>
    @endforeach
</div>

<!-- Pagination -->
@if ($comments instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $comments->hasPages())
    <div class="comment-pagination">
        {{ $comments->appends(request()->except('page'))->links($paginationView) }}
    </div>
@endif
