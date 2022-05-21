<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $credentials = request()->validate([
            'email' => 'email| required | exists:users',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
          request()->session()->regenerate();
          return redirect('home');
        }

        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
