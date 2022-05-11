<?php

use App\Http\Controllers\LoginController; 
use Illuminate\Validation\ValidationException;
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


Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout']);

// IRIA EN EL CONTROLADOR
Route::view('register', 'register')->name('register')->middleware('guest');
Route::post('register', function() {
    
});
