<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function storeVote(Request $request)
    {
        $request->validate([
            'feature_id' => 'required|integer|exists:features,id',
            'comment' => 'nullable|string',
        ]);

        $vote = Votes::create([
            'feature_id' => $request->feature_id,
            'user_id' => auth()->id(), // Get the logged-in user ID
            'comment' => $request->comment,
            'vote_status' => $request->vote_status,
        ]);

        return response()->json(['success' => true, 'vote' => $vote]);
    } 
}
