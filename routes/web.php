<?php

use Illuminate\Support\Facades\Route;

// Fasyankes & Yantek
use App\Http\Controllers\ReportController;

// Auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;

// Fasyankes
use App\Http\Controllers\GeneralRoutesController;
use App\Http\Controllers\fasyankes\HomeController as FasyankesHomeController;
use App\Http\Controllers\fasyankes\ExternalOrderController as FasyankesExternalOrderController;
use App\Http\Controllers\fasyankes\InternalOrderController as FasyankesInternalOrderController;
use App\Http\Controllers\fasyankes\PaymentController as FasyankesPaymentController;
use App\Http\Controllers\fasyankes\CertificateController as FasyankesCertificateController;

// Yantek
use App\Http\Controllers\yantek\AccountController as YanteAccountController;
use App\Http\Controllers\yantek\HomeController as YantekHomeController;
use App\Http\Controllers\yantek\ExternalOrderController as YantekExternalOrderController;
use App\Http\Controllers\yantek\InternalOrderController as YantekInternalOrderController;

// Penyelia
use App\Http\Controllers\penyelia\HomeController as PenyeliaHomeController;
use App\Http\Controllers\penyelia\ExternalOrderController as PenyeliaExternalOrderController;

// Petugas
use App\Http\Controllers\petugas\HomeController as PetugasHomeController;
use App\Http\Controllers\petugas\InternalOrderController as PetugasInternalOrderController;
use App\Http\Controllers\petugas\ExternalOrderController as PetugasExternalOrderController;
use App\Http\Controllers\petugas\ExternalWorksheetController;

// Bendahara
use App\Http\Controllers\bendahara\HomeController as BendaharaHomeController;
use App\Http\Controllers\bendahara\ExternalOrderController as BendaharaExternalOrderController;
use App\Http\Controllers\bendahara\InternalOrderController as BendaharaInternalOrderController;

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
    // Login
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/verify', [LoginController::class, 'verify'])->name('login.verify');
});

// Logout
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::middleware(['fasyankes'])->name('fasyankes.')->group(function(){
    Route::get('/home', [FasyankesHomeController::class, 'index'])->name('home');
    Route::name('order.')->prefix('order')->group(function(){

        // Order Internal
        Route::name('internal.')->prefix('/internal')->group(function(){
            Route::get('/', [FasyankesInternalOrderController::class, 'index'])->name('index');
            Route::get('/create', [FasyankesInternalOrderController::class, 'create'])->name('create');
            Route::post('/store', [FasyankesInternalOrderController::class, 'store'])->name('store');
            Route::prefix('/{id}')->group(function(){
                Route::get('/edit', [FasyankesInternalOrderController::class, 'edit'])->name('edit');
                Route::put('/update', [FasyankesInternalOrderController::class, 'update'])->name('update');
            });
        });

        // Order Eksternal
        Route::name('external.')->prefix('external')->group(function(){
            Route::get('/', [FasyankesExternalOrderController::class, 'index'])->name('index');
            Route::get('/create', [FasyankesExternalOrderController::class, 'create'])->name('create');
            Route::post('/store', [FasyankesExternalOrderController::class, 'store'])->name('store');
            Route::prefix('/{id}')->group(function(){
                Route::get('/cancel', [FasyankesExternalOrderController::class, 'cancel'])->name('cancel');
                Route::get('/order-billing', [FasyankesPaymentController::class, 'orderBilling'])->name('order-billing');
                Route::get('/payment', [FasyankesPaymentController::class, 'index'])->name('payment');
                Route::post('/payment-store', [FasyankesPaymentController::class, 'payment_store'])->name('payment-store');
                Route::get('/edit', [FasyankesExternalOrderController::class, 'edit'])->name('edit');
                Route::put('/update', [FasyankesExternalOrderController::class, 'update'])->name('update');
                Route::put('/update-approval-letter', [FasyankesExternalOrderController::class, 'updateApprovalLetter'])->name('update-approval-letter');
                Route::prefix('/certificates')->name('certificates.')->group(function(){
                    Route::get('/', [FasyankesCertificateController::class, 'index'])->name('index');
                    Route::get('/{alkes_order_id}', [FasyankesCertificateController::class, 'printSertificate'])->name('print');
                });
            });
        });
    });
});

Route::get('/order/{id}/offeringLetter', [ReportController::class, 'printExternalOfferingLetter'])
        ->name('print-offering-letter');

Route::middleware('yantek')->prefix('yantek')->name('yantek.')->group(function(){
    Route::get('/home', [YantekHomeController::class, 'index'])->name('home.index');

    Route::prefix('/account')->name('account.')->group(function(){
        Route::get('/', [YanteAccountController::class, 'index'])->name('index');
        Route::get('/create', [YanteAccountController::class, 'create'])->name('create');
        Route::post('/store', [YanteAccountController::class, 'store'])->name('store');
        Route::prefix('{id}')->group(function(){
            Route::get('/edit', [YanteAccountController::class, 'edit'])->name('edit');
            Route::put('/update', [YanteAccountController::class, 'update'])->name('update');
            Route::get('/detail', [YanteAccountController::class, 'detail'])->name('detail');
            Route::delete('/delete', [YanteAccountController::class, 'delete'])->name('delete');
        });
    });

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
    Route::get('/home', [PetugasHomeController::class, 'index'])->name('home.index');
    Route::prefix('order')->name('order.')->group(function(){

        // Order Internal
        Route::prefix('internal')->name('internal.')->group(function(){
            Route::get('/', [PetugasInternalOrderController::class, 'index'])->name('index');
            Route::prefix('/{id}')->group(function(){
                Route::put('/update-status', [PetugasInternalOrderController::class, 'updateStatus']);
                Route::get('/alkes-reception', [PetugasInternalOrderController::class, 'alkesReceptionPage'])->name('alkes-reception');
                Route::post('/alkes-reception', [PetugasInternalOrderController::class, 'alkesReceptionStore'])->name('alkes-reception-store');
            });
        });

        // Order External
        Route::prefix('external')->name('external.')->group(function(){
            Route::get('/', [PetugasExternalOrderController::class, 'index'])->name('index');
            Route::prefix('{order_id}')->group(function(){
                Route::get('/insert', [ExternalWorksheetController::class, 'insert'])->name('insert');
                Route::post('/append', [ExternalWorksheetController::class, 'appendAlkes'])->name('append');
                Route::put('/finishing', [ExternalWorksheetController::class, 'finishing'])->name('finishing');
                Route::prefix('/worksheet')->name('worksheet.')->group(function(){
                    Route::get('/', [ExternalWorksheetController::class, 'index'])->name('index');
                    Route::prefix('/{alkes_order_id}')->name('excel.')->group(function(){
                        Route::get('/', [ExternalWorksheetController::class, 'excelWorksheet'])->name('index');
                        Route::post('/store', [ExternalWorksheetController::class, 'store'])->name('store');
                        Route::get('/edit', [ExternalWorksheetController::class, 'edit'])->name('edit');
                        Route::put('/update', [ExternalWorksheetController::class, 'update'])->name('update');
                        Route::get('/result', [ExternalWorksheetController::class, 'result'])->name('result');
                        Route::get('/certificate', [ExternalWorksheetController::class, 'certificate'])->name('certificate');
                    });
                });
            });
        });
    });
});

Route::middleware(['bendahara'])->prefix('bendahara')->name('bendahara.')->group(function(){
    Route::get('/home', [BendaharaHomeController::class, 'index'])->name('home.index');

    Route::prefix('/order')->name('order.')->group(function(){
        Route::prefix('internal')->name('internal.')->group(function(){

        });
    
        Route::prefix('external')->name('external.')->group(function(){
            Route::get('/', [BendaharaExternalOrderController::class, 'index'])->name('index');
            Route::prefix('{id}')->group(function(){
                Route::get('confirm-payment', [BendaharaExternalOrderController::class, 'confirmPayment'])->name('confirm-payment');
            });
        });
    });
});