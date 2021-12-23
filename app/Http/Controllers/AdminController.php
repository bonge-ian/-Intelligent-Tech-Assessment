<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->loadMissing('roles');

        return view('admin.user', compact($user));
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email|max:255',
            'password' => 'required|string|min:8'
        ]);

        if (!Auth::attempt($validated)) {
            return redirect()->withErrors('error', 'No user found');
        }

        if (Auth()->user()->isAdmin()) {
            return redirect()->route('admin.index');
        }

        return redirect('/');
    }
}
