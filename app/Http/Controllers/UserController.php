<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('users-page');
        $roles = Role::all();
        $users = User::paginate(11);
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'roles' => 'nullable|array',
        ]);

        $user = User::create($request->only(['name', 'email', 'password']));

        if ($request->has('roles')) {
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('users.index')
            ->with('success', 'User was created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        Gate::authorize('create-users');
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('show-users');

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        Gate::authorize('edit-users');
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:6|confirmed',
            'roles' => 'nullable|array',
        ]);

        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }

        $user->update($userData);

        $user->syncRoles($request->input('roles', []));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('destroy-users');

        $user->posts()->delete();
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
