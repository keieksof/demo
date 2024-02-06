<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{

    public function index()
    {
        Gate::authorize('tags-page');
        $tags = Tag::paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $existingTag = Tag::where('name', $request->name)->first();

        if ($existingTag) {
            return redirect()->route('tags.index')->with('error', 'Tag with the same name already exists.');
        }

        Tag::create($request->all());

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag)
    {

        Gate::authorize('show-tags');


        return view('tags.show', compact('tag'));

    }


    public function edit(Tag $tag)
    {
        Gate::authorize('edit-tags');
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {

        $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {

        Gate::authorize('destroy-tags');

        $tag->delete();
        return redirect()->route('tags.index');
    }


}
