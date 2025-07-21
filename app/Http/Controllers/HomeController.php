<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $votes = Poll::all();
        return view("home", compact("votes"));
    }
    public function voteIncreament($id)
    {
        Poll::where('id', $id)->increment('count');
        return redirect('/');

    }
}
