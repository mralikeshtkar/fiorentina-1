@php
    use App\Models\Calendario;
    use App\Models\MatchCommentary;
    if ($matchId) {
        $match = Calendario::where('match_id', $matchId)->first();
        $commentaries = MatchCommentary::where('match_id', $matchId)->get();
    }
@endphp
@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    @include('diretta.includes.addDiretta', [
        'commentaries' => $commentaries,
    ])
@endsection
