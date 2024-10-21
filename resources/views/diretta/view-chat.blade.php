@php
    use App\Models\Calendario;
    use App\Models\Message;
    if ($matchId) {
        $match = Calendario::where('match_id', $matchId)->first();
        $chats = Message::where('match_id', $matchId)->get();
    }
@endphp
@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
@endsection
