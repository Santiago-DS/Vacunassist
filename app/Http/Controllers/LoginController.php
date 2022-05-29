<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ValidationException;
use Dotenv\Exception\ValidationException as ExceptionValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        $credentials = request()->validate([
            'email' => 'email| required | exists:users',
            'password' => 'required',
        ]);

        $usuario = DB::table('users')->where('users.email', request()->get('email'))->get();

        if (Auth::attempt($credentials) && (auth()->user()->rol =='paciente')){
          request()->session()->regenerate();
          return redirect('home');
        }else{

            if (Auth::attempt($credentials) && (auth()->user()->rol =='enfermero')){
                request()->session()->regenerate();
                return redirect('homeEnfermero');
            }


        }
        if (Auth::attempt($credentials) && (auth()->user()->rol =='administrativo')){
            request()->session()->regenerate();
            return redirect('homeAdministrativo'); // hacer vista y ruta.
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
