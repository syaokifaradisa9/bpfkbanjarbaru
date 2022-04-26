<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ExternalOrderController;
use App\Http\Controllers\InternalOrderController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['guest', 'guest:admin'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::get('/register/notify/{token}', [RegisterController::class, 'notify'])->name('register.notify');
    Route::get('/register/verify/{token}', [RegisterController::class, 'verify'])->name('register.verify');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/verify', [LoginController::class, 'verify'])->name('login.verify');
});

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::middleware(['user'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    Route::get('/order/internal', [InternalOrderController::class, 'index'])->name('order.internal');
    Route::get('/order/internal/create', [InternalOrderController::class, 'create'])->name('order.internal.create');
    Route::post('/order/internal/store', [InternalOrderController::class, 'store'])->name('order.internal.store');

    Route::get('/order/external', [ExternalOrderController::class, 'index'])->name('order.external');
    Route::get('/order/external/create', [ExternalOrderController::class, 'create'])->name('order.external.create');
    Route::post('/order/external/store', [ExternalOrderController::class, 'store'])->name('order.external.store');
});

Route::middleware(['admin'])->group(function(){
    Route::get('/admin/home', function(){
        dd("Asdasd");
    })->name('admin.home');
});
