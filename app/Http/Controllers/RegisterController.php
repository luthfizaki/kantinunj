<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index () {
        return view ('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store (Request $request) {
        $validate = $request->validate ([
            'name' => 'required|max:255',
            'username' => 'required|min:5|unique:users,username',
            'no_telpon' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'status' => 'required'
        ]);
        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        // $request->session()->flash('success', 'Registrasi Berhasil!');
        return redirect ('/login')->with('success', 'Registrasi Berhasil!');
    }
}
