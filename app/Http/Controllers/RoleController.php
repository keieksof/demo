<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        Gate::authorize('roles-page');
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('roles.index');
    }

    public function create()
    {

        Gate::authorize('create-roles');
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
        Gate::authorize('edit-roles');
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {

        Gate::authorize('destroy-roles');
        if ($role->name === 'admin') {
            return redirect()->route('roles.index');
        }

        $role->delete();

        return redirect()->route('roles.index');
    }
}
