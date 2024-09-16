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
    $currentIndent ??= 0;

    if (!view()->exists($paginationView = Theme::getThemeNamespace('partials.pagination'))) {
        $paginationView = 'pagination::bootstrap-5';
    }
@endphp

    <!-- Comment List -->
<div class="fob-comment-list" style="padding: 20px;">
    @foreach ($comments as $comment)
        @continue(!$comment->is_approved && $comment->ip_address !== request()->ip())

        <!-- Individual Comment -->
        <div id="comment-{{ $comment->getKey() }}" class="fob-comment-item" style="margin-bottom: 20px; border: 1px solid #e0e0e0; border-radius: 8px; padding: 10px;">

            <!-- Comment Header (Avatar, Name, and Date) -->
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <!-- Avatar -->
                <div class="fob-comment-item-avatar" style="margin-right: 15px;">
                    @if ($comment->website)
                        <a href="{{ $comment->website }}" target="_blank">
                            <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}" style="width: 50px; height: 50px; border-radius: 50%;">
                        </a>
                    @else
                        <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}" style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif
                </div>

                <!-- Name and Date -->
                <div style="flex-grow: 1;">
                    <span style="font-weight: bold; font-size: 16px;">{{ $comment->name }}</span>
                    <span style="font-size: 12px; color: #999; display: block;">{{ $comment->created_at->format('d F Y H:i') }}</span>
                </div>
            </div>

            <!-- Comment Content -->
            <div class="fob-comment-item-content" style="margin-bottom: 10px;">
                @if (!$comment->is_approved)
                    <em class="fob-comment-item-pending" style="font-style: italic; color: #999;">
                        {{ trans('plugins/fob-comment::comment.front.list.waiting_for_approval_message') }}
                    </em>
                @endif

                <p style="font-size: 14px; margin-bottom: 0;">{{ $comment->formatted_content }}</p>
            </div>

            <!-- Comment Footer (Likes, Dislikes, and Reply) -->
            <div class="fob-comment-item-footer" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <!-- Like and Dislike -->
                    <span style="margin-right: 10px;">
                        <i class="fa fa-thumbs-up" style="color: green;"></i> 1
                    </span>
                    <span style="margin-right: 10px;">
                        <i class="fa fa-thumbs-down" style="color: red;"></i> 0
                    </span>

                    <!-- Reply Button -->
                    @if ($comment->is_approved)
                        <a href="{{ route('fob-comment.public.comments.reply', $comment) }}" class="fob-comment-item-reply" style="color: #007bff; text-decoration: none;">
                            <i class="fa fa-reply" style="margin-right: 5px;"></i>
                            {{ trans('plugins/fob-comment::comment.front.list.reply') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Nested Replies -->
        @if ($comment->replies->count())
            <div style="margin-left: {{ 20 * $currentIndent }}px;">
                @include('plugins/fob-comment::partials.list', [
                    'comments' => $comment->replies,
                    'currentIndent' => $currentIndent + 1,
                ])
            </div>
        @endif
    @endforeach
</div>

<!-- Comment Form -->
<div class="fob-comment-form" style="border: 1px solid #e0e0e0; padding: 15px; border-radius: 8px;">
    <form action="{{ route('post.comment') }}" method="POST">
        @csrf
        <textarea class="form-control" name="comment" placeholder="Scrivi un commento..." style="width: 100%; height: 100px; margin-bottom: 10px;"></textarea>
        <input type="email" class="form-control" name="email" placeholder="Email" style="width: 100%; margin-bottom: 10px;">
        <button type="submit" class="btn btn-success" style="width: 100%; background-color: #28a745; border-color: #28a745;">Pubblica commento</button>
    </form>
</div>

<!-- Pagination -->
@if ($comments instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $comments->hasPages())
    <div class="fob-comment-pagination" style="text-align: center; margin-top: 20px;">
        {{ $comments->appends(request()->except('page'))->links($paginationView) }}
    </div>
@endif
