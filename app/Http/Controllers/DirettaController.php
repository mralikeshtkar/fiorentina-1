<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standing;
use App\Models\Matches;
use App\Models\Calendario;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Botble\Base\Supports\Breadcrumb;

use Botble\Base\Http\Controllers\BaseController;

// sportmonks B0lZqWEdqBzEPrLW5gDcm87Svgb5bnEEa807fd7kOiONHbcbetXywqPQafqC

class StandingController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add("Diretta");
    }
    // Fetch latest comments
    public function fetchLastComments(Request $request)
    {
        $match_id=$request->input('match_id');
        $comments = DirettaComment::where('match_id', $lastId)->orderBy('created_at', 'asc')->get();
        return response()->json($comments);
    }

    public function view(){
        $matchId = request()->query('match_id');
    
        $this->pageTitle("Diretta di $matchId");

        return view('diretta.view','');
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
    
