<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;

// Fasyenkes
use App\Http\Controllers\GeneralRoutesController;
use App\Http\Controllers\fasyenkes\HomeController as FasyenkesHomeController;
use App\Http\Controllers\fasyenkes\ExternalOrderController as FasyenkesExternalOrderController;
use App\Http\Controllers\fasyenkes\InternalOrderController as FasyenkesInternalOrderController;
use App\Http\Controllers\ReportController;

// Yantek
use App\Http\Controllers\yantek\HomeController as YantekHomeController;
use App\Http\Controllers\yantek\ExternalOrderController as YantekExternalOrderController;
use App\Http\Controllers\yantek\InternalOrderController as YantekInternalOrderController;

// Penyelia
use App\Http\Controllers\penyelia\HomeController as PenyeliaHomeController;
use App\Http\Controllers\penyelia\ExternalOrderController as PenyeliaExternalOrderController;

// Petugas
use App\Http\Controllers\petugas\HomeController as PetugasHomeController;
use App\Http\Controllers\petugas\ExternalOrderController as PetugasExternalOrderController;
use App\Http\Controllers\petugas\ExternalWorksheetController;

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

Route::get('/home-redirect', [GeneralRoutesController::class, 'home'])->name('home-redirect');
Route::get('/order-internal-redirect', [GeneralRoutesController::class, 'internalOrder'])->name('order-internal-redirect');
Route::get('/order-external-redirect', [GeneralRoutesController::class, 'externalOrder'])->name('order-external-redirect');

Route::middleware(['guest'])->group(function () {
    // Register
    Route::prefix('register')->name('register.')->group(function(){
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::get('/notify/{token}', [RegisterController::class, 'notify'])->name('notify');
        Route::get('/verify/{token}', [RegisterController::class, 'verify'])->name('verify');
        Route::post('/store', [RegisterController::class, 'store'])->name('store');
    });

    // Login
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/verify', [LoginController::class, 'verify'])->name('login.verify');
});

// Logout
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::middleware(['fasyenkes'])->name('fasyenkes.')->group(function(){
    Route::get('/home', [FasyenkesHomeController::class, 'index'])->name('home');
    Route::name('order.')->prefix('order')->group(function(){

        // Order Internal
        Route::name('internal.')->prefix('/internal')->group(function(){
            Route::get('/', [FasyenkesInternalOrderController::class, 'index'])->name('index');
            Route::get('/create', [FasyenkesInternalOrderController::class, 'create'])->name('create');
            Route::post('/store', [FasyenkesInternalOrderController::class, 'store'])->name('store');
        });

        // Order Eksternal
        Route::name('external.')->prefix('external')->group(function(){
            Route::get('/', [FasyenkesExternalOrderController::class, 'index'])->name('index');
            Route::get('/create', [FasyenkesExternalOrderController::class, 'create'])->name('create');
            Route::post('/store', [FasyenkesExternalOrderController::class, 'store'])->name('store');
            Route::post('/cancel', [FasyenkesExternalOrderController::class, 'cancel'])->name('cancel');
        });
    });
});

Route::get('/order/{id}/offeringLetter', [ReportController::class, 'printExternalOfferingLetter'])->name('print-offering-letter');

Route::middleware('yantek')->prefix('yantek')->name('yantek.')->group(function(){
    Route::get('/home', [YantekHomeController::class, 'index'])->name('home.index');
    Route::name('order.')->prefix('order')->group(function(){

        // Order Internal
        Route::name('internal.')->prefix('internal')->group(function(){
            Route::get('/', [YantekInternalOrderController::class, 'index'])->name('index');
            Route::put('/accept', [YantekInternalOrderController::class, 'accept'])->name('accept');
            Route::put('/reject', [YantekInternalOrderController::class, 'reject'])->name('reject');
        });

        // Order Eksternal
        Route::name('external.')->prefix('external')->group(function(){
            Route::get('/', [YantekExternalOrderController::class, 'index'])->name('index');
            Route::put('/accept', [YantekExternalOrderController::class, 'accept'])->name('accept');
            Route::put('/reject', [YantekExternalOrderController::class, 'reject'])->name('reject');

            Route::get('/edit/{id}/accommodation', [YantekExternalOrderController::class, 'editAccommodation'])->name('edit_accommodation');
            Route::put('/update/{id}/accommodation', [YantekExternalOrderController::class, 'updateAccommodation'])->name('update_accommodation');

            Route::get('/edit/{id}/estimation', [YantekExternalOrderController::class, 'editEstimation'])->name('edit_estimation');
            Route::put('/update/{id}/estimation', [YantekExternalOrderController::class, 'updateEstimation'])->name('update_estimation');
        });
    });
});

Route::middleware(['penyelia'])->prefix('penyelia')->name('penyelia.')->group(function(){
    Route::get('/home', [PenyeliaHomeController::class, 'index'])->name('home.index');
    Route::prefix('order')->name('order.')->group(function(){
        
        // Order Internal
        Route::prefix('internal')->name('internal.')->group(function(){

        });

        // Order Eksternal
        Route::prefix('external')->name('external.')->group(function(){
            Route::get('/', [PenyeliaExternalOrderController::class, 'index'])->name('index');
            Route::get('/{id}/officer', [PenyeliaExternalOrderController::class, 'officeEdit'])->name('officer-edit');
            Route::post('/{id}/update', [PenyeliaExternalOrderController::class, 'officeUpdate'])->name('officer-update');

            Route::get('/edit/{id}/estimation', [PenyeliaExternalOrderController::class, 'editEstimation'])->name('edit_estimation');
            Route::put('/update/{id}/estimation', [PenyeliaExternalOrderController::class, 'updateEstimation'])->name('update_estimation');
        });
    });
});

Route::middleware(['petugas'])->prefix('petugas')->name('petugas.')->group(function(){
    Route::get('/petugas/home', [PetugasHomeController::class, 'index'])->name('home.index');
    Route::prefix('order')->name('order.')->group(function(){

        // Order Internal
        Route::prefix('internal')->name('internal.')->group(function(){

        });

        // Order External
        Route::prefix('external')->name('external.')->group(function(){
            Route::get('/', [PetugasExternalOrderController::class, 'index'])->name('index');
            Route::prefix('{order_id}/worksheet')->name('worksheet.')->group(function(){
                Route::get('/', [ExternalWorksheetController::class, 'index'])->name('index');
                Route::get('/{alkes_order_id}', [ExternalWorksheetController::class, 'excelWorksheet'])->name('excel');
            });
        });
    });
});

Route::middleware(['bendahara'])->prefix('bendahara')->name('bendahara.')->group(function(){
    Route::get('/petugas/home', function(){
        dd("Petugas");
    })->name('petugas.home');
});