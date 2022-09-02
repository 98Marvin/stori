<?php

namespace App\Http\Controllers;

use App\Story;
use App\Http\Requests\StoryRequest;
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

    public function store(StoryRequest $request)
    {

        auth()
            ->user()
            ->stories()
            ->create([
                $request->validated()
            ]);

        return redirect()
            ->route('stories')
            ->with('status', 'Story Created Successfully...!!');
    }

    public function edit(Story $story)
    {
        return view('stories.edit', compact('story'));
    }

    public function update(Story $story, StoryRequest $request)
    {
        $input = $request->validated();

        $story->update($input);

        return redirect()
            ->route('stories')
            ->with('status', 'Story was Updated Successfully..!!');
    }
}
