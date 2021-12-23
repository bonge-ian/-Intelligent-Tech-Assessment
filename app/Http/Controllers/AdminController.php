<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
