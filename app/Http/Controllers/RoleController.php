<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->simplePaginate(5);

        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        role::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return redirect('/roles');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', ['role' => $role]);
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $role->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return redirect('/roles/' . $role->id);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect('/roles');
    }
}
