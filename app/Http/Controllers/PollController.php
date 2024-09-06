<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PollController extends Controller
{
    public function create()
    {
        return view('polls.create');
    }
    
    public function index()
    {
        $polls = Poll::with('options')->paginate(10);
        return view('polls.index', compact('polls'));
    }
    
    public function toggleActive($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->active = !$poll->active;
        $poll->save();
    
        return redirect()->route('polls.index')->with('success', 'Poll status changed successfully');
    }
    
    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();
    
        return redirect()->route('polls.index')->with('success', 'Poll deleted successfully');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'options.*' => 'required|string|max:255',
        ]);
    
        $poll = new Poll(['question' => $request->question]);
        $poll->save();
    
        foreach ($request->options as $option) {
            $poll->options()->create(['option' => $option]);
        }
    
        return redirect()->route('polls.index')->with('success', 'Poll created successfully!');
    }
    



    public function exportResults($id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        $csvExporter = new \Laracsv\Export();
        $csv = $csvExporter->build($poll->options, ['option', 'votes'])->getCsv();

        return Response::make($csv, 200, [
            'Content-Type' => 'application/csv',
            'Content-Disposition' => 'attachment; filename="poll_results.csv"',
        ]);
    }

    // Methods for user actions
    public function vote(Request $request, $optionId)
    {
        $option = PollOption::findOrFail($optionId);
        $option->votes++;
        $option->save();

        return response()->json(['status' => 'Vote recorded']);
    }

    public function unvote(Request $request, $optionId)
    {
        $option = PollOption::findOrFail($optionId);
        $option->votes = max(0, $option->votes - 1);
        $option->save();

        return response()->json(['status' => 'Vote removed']);
    }

    public function results($id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        return response()->json($poll);
    }
}
