<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        // log the non admin out
        $this->logout();

        session()->flash('status', 'Only admins can login in via the login form');

        return redirect('/');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login');
    }
}
