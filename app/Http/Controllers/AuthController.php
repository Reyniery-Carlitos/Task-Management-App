<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request) {
        try{
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('token')->plainTextToken;
                $cookie = cookie('cookie_token', $token, 60 * 24);
                return response([
                    'token' => $token,
                    'data' => $user
                ], 200)->withCookie($cookie);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Invalid credentials'
                ], 401);
            }
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function ingresar() {
        return Inertia::render('login.index');
        // return view('login.ingresar');
    }
}
