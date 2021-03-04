<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/layout');
        } else {
            return response()->json([
                'message' => 'invalided username & password'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/layout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
