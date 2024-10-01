@php
    use App\Models\Calendario;
    use App\Models\MatchCommentary;
    $matchId = request()->query('match_id');
    if ($matchId) {
        $match = Calendario::where('match_id', $matchId)->first();
        $commentaries = MatchCommentary::where('match_id', $matchId)->get();
    }
@endphp
@include('diretta.includes.addDiretta', [
    'commentaries' => $commentaries,
])
