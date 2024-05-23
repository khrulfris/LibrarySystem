<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->back()
        ->with('success','User created successfully', 'OK');
    }

    public function show($id){

    }

    public function edit(User $user){
        return view('users.edit', compact('user'));

    }

    public function update(Request $request, User $user){
        $user->update($request->all());
        return redirect()->route('users.index')
        ->with('success','User updated successfully', 'OK');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')
        ->with('success','User deleted successfully', 'OK');
    }
}
