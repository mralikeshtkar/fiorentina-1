<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standing;
use App\Models\Matches;
use App\Models\Calendario;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
// sportmonks B0lZqWEdqBzEPrLW5gDcm87Svgb5bnEEa807fd7kOiONHbcbetXywqPQafqC

class StandingController extends Controller
{

    // Fetch latest comments
    public function fetchLastComments(Request $request)
    {
        $match_id=$request->input('match_id');
        $comments = DirettaComment::where('match_id', $lastId)->orderBy('created_at', 'asc')->get();
        return response()->json($comments);
    }

    // Post a new comment
    public function storeCommentary(Request $request)
    {   
        $match_id=$request->input('match_id');
        $comment = DirettaComment::create([
            'match_id'=>$match_id,
            'event_type'=>$request->input('event_type'),
            'comment'=>$request->input('comments')??'',
            'details'=>$request->input('details')??'',
            'content' => $request->input('content'),
        ]);
        return response()->json($comment);
    }

    


}
    
