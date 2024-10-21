@php
    use Botble\Member\Models\Member;
@endphp
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
            <div class="user">
                @php $user=Member::find($chat['user_id']); @endphp
                {{ $user->first_name }} {{ $user->last_name }}
            </div>
            <div class="comment-text">{{ $chat['message'] }}
            </div>
            <div class="text-white p-2">{{ $chat['created_at'] }}</div>
        </div>
    @endforeach
</div>
