<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('categories-page');
        $categories = Category::paginate(11);
        return view('categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name'
        ]);

        $existing = Category::where('name', $request->name)->first();

        if ($existing) {
            return redirect()->route('categories.create')->with('error', 'Category with the same name already exists.');
        }

        Category::create($request->all());

        $category = Category::create($request->all());
        $user = Auth::user();

//        $user->notify(new CategoryCreatedNotification($category));


        return redirect()->route('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        Gate::authorize('create-categories');
        return view('categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        Gate::authorize('show-categories');
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        Gate::authorize('edit-categories');
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category->id)],
        ]);


        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('destroy-categories');


        $category->posts()->delete();
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'category deleted successfully');
    }
}
