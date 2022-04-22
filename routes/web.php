<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::get('/register/notify/{token}', [RegisterController::class, 'notify'])->name('register.notify');
    Route::get('/register/verify/{token}', [RegisterController::class, 'verify'])->name('register.verify');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/verify', [LoginController::class, 'verify'])->name('login.verify');
});

Route::middleware((['auth']))->group(function(){
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});
