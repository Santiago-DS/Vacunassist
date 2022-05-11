<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $credentials = request()->validate([ 
            'email' => ['required','email','string'],
            'password' => ['required','string'] 
        ]);
    
        if (Auth::attempt($credentials)){
          request()->session()->regenerate();
          return redirect('dashboard');
        }
        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
