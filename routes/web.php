<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');

// IRIA EN EL CONTROLADOR - LOGIN
Route::post('login', function() {
    $credentials = request()->only('email','password');

    if (Auth::attempt($credentials)){
      request()->session()->regenerate();
      return redirect('dashboard');
    }
    return redirect('login');
});



// IRIA EN EL CONTROLADOR
Route::view('register', 'register')->name('register')->middleware('guest');
Route::post('register', function() {
    
});


// IRIA EN EL CONTROLADOR
Route::post('logout', function() {
    Auth::logout();
});