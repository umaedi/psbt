<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password'  => 'required'
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user->active != '1' && password_verify($request->password, $user->password)) {
            return response()->json([
                'success'   => false,
                'message'   => 'Akun Anda belum aktif!',
            ], 401);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'success'   => true,
                'message'   => 'Anda berhasil login',
            ], 200);
        }

        return response()->json([
            'success'   => false,
            'message'   => 'Email Atau Password Salah!',
        ], 401);
    }
}
