<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index () {

        $stories = Story::where('user_id', auth()->user()->id)->paginate(1);
        return view('stories.index', compact('stories'));
    }
}
