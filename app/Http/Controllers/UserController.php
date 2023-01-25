<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
//        return 'hello world legit';
        return User::all();
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function register(UserRegisterRequest $request)
    {
        // this will work but we want to hash the password and not store it as plain text
//        User::create($request->all());
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
//            'password' => bcrypt($request->password)
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'User created successfully'
        ], 201);

    }
}
