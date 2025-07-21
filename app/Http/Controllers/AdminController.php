<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $votes = Poll::all();
        return view("admin.panel", compact("votes"));
    }
    public function addVoteView()
    {
        return view("admin.addVote");
    }
    public function addVote(Request $request)
    {
        $formData = $request->all();
        Poll::create($formData);
        return redirect()->route("admin.panel");
    }
    public function deleteVote($id)
    {
        $vote = Poll::where("id" , $id)->delete();
        
        return redirect()->route("admin.panel");
    }
 
}
