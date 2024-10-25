<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function deactivate(User $user) {
        $user->update(['status' => 'inactive']);
        return redirect()->route('users.index');
    }
}

