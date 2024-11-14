<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
            $user = Auth::user();
            $token = $user->createToken('sanctum')->plainTextToken;
            return response()->json([
                'message' => 'Login berhasil'
            ])->cookie(
                    'XSRF-TOKEN',
                    $token,
                    60,
                    null,
                    null,
                    true,
                    true
                );
            ;
        }

        return response()->json([
            'message' => 'Login gagal'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::logout();
        $request->session()->regenerate();
        return redirect('/login')
            ->withCookie(cookie()->forget('XSRF-TOKEN'));
    }
}
