<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view ('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login (Request $request) {
        $validate = $request->validate ([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            if(Auth()->user()->status == 'admin') {
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login Gagal!!');
    }

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
