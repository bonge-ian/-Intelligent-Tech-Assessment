<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $validated = $request->validate($this->loginValidationRules());

        if (!Auth::attempt($validated)) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Credentials not match',
                'data' => []
            ], 401);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'User successfully logged in',
            'data' => [
                'token' =>
                Auth::user()->createToken('API Token')->plainTextToken
            ]
        ], 200);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    public function register(Request $request)
    {
        $validated = $request->validate($this->registerValidationRules());

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        $role = Role::where('name', 'user')->first();

        $user->roles()->attach($role);

        return response()->json([
            'status' => 'Success',
            'message' => 'User successfully created',
            'data' => [
                'token' => $user->createToken('API Token')->plainTextToken
            ]
        ], 200);
    }

    protected function loginValidationRules(): array
    {
        return [
            'email' => 'required|email|exists:users,email|max:255',
            'password' => 'required|string|min:8'
        ];
    }

    protected function registerValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)
            ],
            'phone' => 'phone:KE',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->uncompromised()
            ]
        ];
    }
}
