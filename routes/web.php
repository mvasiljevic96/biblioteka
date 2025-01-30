<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RezervacijaController;

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

Auth::routes();

Route::get('/', function () {
    // Provera da li je korisnik ulogovan
    if (Auth::check()) {
        return redirect()->route('home');  // Ako je ulogovan, ide na home
    } else {
        return redirect()->route('login');  // Ako nije ulogovan, ide na login
    }
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('admins', App\Http\Controllers\AdminController::class);

Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('knjigas', App\Http\Controllers\KnjigaController::class);

Route::resource('rezervacijas', App\Http\Controllers\RezervacijaController::class);


