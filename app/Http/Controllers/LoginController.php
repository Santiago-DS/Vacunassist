<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ValidationException;
use Dotenv\Exception\ValidationException as ExceptionValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;

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

        throw ValidationValidationException::withMessages([
            'password' => __('auth.failed')
        ]);
        //return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
