<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Notifications\PostCreatedNotification;
use App\Notifications\PostUpdatedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('posts-page');
        $posts = Post::orderBy('id', 'desc')->paginate(11);

        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        Gate::authorize('show-posts');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        Gate::authorize('edit-posts');
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        // Validate the request using PostRequest
        $validatedData = $request->validated();


//        // Check if 'photo' file is present in the request
//        if ($request->hasFile('photo')) {
//            // Store the 'photo' file and update the validated data
//            $validatedData['photo'] = $request->file('photo')->store('photos');
//        }
//
//        if ($request->hasFile('thumbnail')) {
//            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
//        }

        $validatedData['photo'] = $post->uploadFile($request, 'foto', 'photos', 'photo');


        $validatedData['thumbnail'] = $post->uploadFile($request, 'thumbnail', 'thumbnails', 'thumbnail');


        // Update post with validated data
        $post->update($validatedData);

        // Notify user if post was updated by someone else
        if ($post->wasChanged() && auth()->user()->id != $post->user_id) {
            $post->user->notify(new PostUpdatedNotification($post, auth()->user()));
        }

        // Sync tags only if they are provided in the request
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
        }

        return redirect()->route('allposts');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(PostRequest $request)
    {

        $validatedData = $request->validated();

        //merr userin e authentikuar

        $user = Auth::user();
        //$request->file() (merr filen nga form request dhe e ben store ne folderin photos brenda storage). $validatedData = (ben store file path ne DB.)


//        if ($request->file('photo')) {
//            $validatedData['photo'] = $request->file('photo')->store('photos');
//        }
//
//        if ($request->file('thumbnail')) {
//            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
//        }
//        $photo = $request->file('photo')->store('photos');
//        $thumbnail = $request->file('thumbnail')->store('thumbnails');

        $post = new Post;
//
        $validatedData['photo'] = $post->uploadFile($request, 'oto', 'photos', 'photo');

        $validatedData['thumbnail'] = $post->uploadFile($request, 'thumbnail', 'thumbnails', 'thumbnail');


        //schedule post
        $scheduledAt = $validatedData['scheduled_at'];

        $display = $request->has('display') || !$scheduledAt;


        //krijon nje post te krijuar nga useri i authentikuar
        $post = $user->posts()->create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'foto' => $validatedData['photo'],
            'thumbnail' => $validatedData['thumbnail'],
            'category_id' => $validatedData['category_id'],
            'display' => $display,
            'scheduled_at' => $scheduledAt,
        ]);


        $post->tags()->sync($request->input('tags', []));


        $user->notify(new PostCreatedNotification($post, $user));


        return redirect()->route('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        Gate::authorize('create-posts');
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('destroy-posts');
        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Show all posts.
     */
    public function showAllPosts()
    {
        $posts = Post::where('display', true)->orderBy('id', 'desc')->paginate(5);
        return view('posts.all', compact('posts'));
    }

}
