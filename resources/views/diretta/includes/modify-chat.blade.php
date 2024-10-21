<div class="container mt-3">
    @foreach ($chats as $chat)
        <div class="commentary-row">
            <div style="flex: 0.5">
                @if (Str::contains(request()->url(), '/chat-view'))
                    <a style="margin-right: 5px" href="/delete-chat?id={{ $chat->id }}"><i
                            class="text-danger fa-solid fa-trash"></i></a>
                    <a href="/modify-commentary?id={{ $chat->id }}"><i
                            class="text-white fa-solid fa-pen-to-square"></i></i></a>
                @endif
            </div>
            <div class="comment-text">{{ $chat['message'] }}
            </div>
            <div>{{ $chat['created_at'] }}</div>
        </div>
    @endforeach
</div>
