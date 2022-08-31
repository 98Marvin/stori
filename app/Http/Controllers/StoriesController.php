<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)->paginate(3);
        return view('stories.index', compact('stories'));
    }

    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    public function create()
    {
        $story = new Story();
        return view('stories.create', compact('story'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'genre' => 'required',
            'status' => 'required',
        ]);

        auth()
            ->user()
            ->stories()
            ->create([
                'title' => $request->title,
                'body' => $request->body,
                'genre' => $request->genre,
                'status' => $request->status,
                // 'user_id' => $request->user()->id
            ]);

        return redirect()
            ->route('stories')
            ->with('status', 'Story Created Successfully...!!');
    }

    public function edit(Story $story)
    {
        return view('stories.edit', compact('story'));
    }

    public function update(Story $story, Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'genre' => 'required',
            'status' => 'required',
        ]);

        $story->update($input);

        return redirect()
            ->route('stories')
            ->with('status', 'Story was Updated Successfully..!!');
    }
}
