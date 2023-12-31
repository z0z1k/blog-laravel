<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Role as saveRolesRequest;

use App\Models\Role;
use App\Models\User;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function roles($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name')->get();

        return view('users.roles', compact('user', 'roles'));
    }

    public function saveRoles(saveRolesRequest $request, $id)
    {
        User::findOrFail($id)->roles()->sync($request->roles);
        return redirect()->route('users.index');
    }
}
