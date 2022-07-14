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
use App\Http\Controllers\fasyankes\InsituOrderController as FasyankesInsituOrderController;
use App\Http\Controllers\fasyankes\InternalOrderController as FasyankesInternalOrderController;
use App\Http\Controllers\fasyankes\PaymentController as FasyankesPaymentController;
use App\Http\Controllers\fasyankes\CertificateController as FasyankesCertificateController;

// Yantek
use App\Http\Controllers\yantek\AccountController as YanteAccountController;
use App\Http\Controllers\yantek\HomeController as YantekHomeController;
use App\Http\Controllers\yantek\InsituOrderController as YantekInsituOrderController;
use App\Http\Controllers\yantek\InternalOrderController as YantekInternalOrderController;

// Penyelia
use App\Http\Controllers\penyelia\HomeController as PenyeliaHomeController;
use App\Http\Controllers\penyelia\InsituOrderController as PenyeliaInsituOrderController;
use App\Http\Controllers\penyelia\InternalOrderController as PenyeliaInternalOrderController;

// Petugas
use App\Http\Controllers\petugas\HomeController as PetugasHomeController;
use App\Http\Controllers\petugas\InternalOrderController as PetugasInternalOrderController;
use App\Http\Controllers\petugas\InsituOrderController as PetugasInsituOrderController;
use App\Http\Controllers\petugas\WorksheetController;

// Bendahara
use App\Http\Controllers\bendahara\HomeController as BendaharaHomeController;
use App\Http\Controllers\bendahara\InsituOrderController as BendaharaInsituOrderController;
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
Route::get('/order-insitu-redirect', [GeneralRoutesController::class, 'externalOrder'])->name('order-insitu-redirect');

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
                Route::get('/payment', [FasyankesPaymentController::class, 'index'])->name('payment');
                Route::get('/order-billing', [FasyankesPaymentController::class, 'orderBilling'])->name('order-billing');
                Route::post('/payment-store', [FasyankesPaymentController::class, 'payment_store'])->name('payment-store');
                Route::prefix('/certificates')->name('certificates.')->group(function(){
                    Route::get('/', [FasyankesCertificateController::class, 'index'])->name('index');
                    Route::get('/{alkes_order_id}', [FasyankesCertificateController::class, 'printSertificate'])->name('print');
                });
            });
        });

        // Order Eksternal
        Route::name('insitu.')->prefix('insitu')->group(function(){
            Route::get('/', [FasyankesInsituOrderController::class, 'index'])->name('index');
            Route::get('/create', [FasyankesInsituOrderController::class, 'create'])->name('create');
            Route::post('/store', [FasyankesInsituOrderController::class, 'store'])->name('store');
            Route::prefix('/{id}')->group(function(){
                Route::get('/cancel', [FasyankesInsituOrderController::class, 'cancel'])->name('cancel');
                Route::get('/order-billing', [FasyankesPaymentController::class, 'orderBilling'])->name('order-billing');
                Route::get('/payment', [FasyankesPaymentController::class, 'index'])->name('payment');
                Route::post('/payment-store', [FasyankesPaymentController::class, 'payment_store'])->name('payment-store');
                Route::get('/edit', [FasyankesInsituOrderController::class, 'edit'])->name('edit');
                Route::put('/update', [FasyankesInsituOrderController::class, 'update'])->name('update');
                Route::put('/update-approval-letter', [FasyankesInsituOrderController::class, 'updateApprovalLetter'])->name('update-approval-letter');
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
        Route::name('insitu.')->prefix('insitu')->group(function(){
            Route::get('/', [YantekInsituOrderController::class, 'index'])->name('index');
            Route::put('/accept', [YantekInsituOrderController::class, 'accept'])->name('accept');
            Route::put('/reject', [YantekInsituOrderController::class, 'reject'])->name('reject');

            Route::get('/edit/{id}/accommodation', [YantekInsituOrderController::class, 'editAccommodation'])->name('edit_accommodation');
            Route::put('/update/{id}/accommodation', [YantekInsituOrderController::class, 'updateAccommodation'])->name('update_accommodation');

            Route::get('/edit/{id}/estimation', [YantekInsituOrderController::class, 'editEstimation'])->name('edit_estimation');
            Route::put('/update/{id}/estimation', [YantekInsituOrderController::class, 'updateEstimation'])->name('update_estimation');
        });
    });
});

Route::middleware(['penyelia'])->prefix('penyelia')->name('penyelia.')->group(function(){
    Route::get('/home', [PenyeliaHomeController::class, 'index'])->name('home.index');
    Route::prefix('order')->name('order.')->group(function(){
        
        // Order Internal
        Route::prefix('internal')->name('internal.')->group(function(){
            Route::get('/', [PenyeliaInternalOrderController::class, 'index'])->name('index');
            Route::prefix('{id}')->group(function(){
                Route::get('officer', [PenyeliaInternalOrderController::class, 'officeEdit'])->name('officer-edit');
                Route::put('officer', [PenyeliaInternalOrderController::class, 'officeUpdate'])->name('officer-update');
            });
        });

        // Order Eksternal
        Route::prefix('insitu')->name('insitu.')->group(function(){
            Route::get('/', [PenyeliaInsituOrderController::class, 'index'])->name('index');
            Route::get('/{id}/officer', [PenyeliaInsituOrderController::class, 'officeEdit'])->name('officer-edit');
            Route::post('/{id}/update', [PenyeliaInsituOrderController::class, 'officeUpdate'])->name('officer-update');

            Route::get('/edit/{id}/estimation', [PenyeliaInsituOrderController::class, 'editEstimation'])->name('edit_estimation');
            Route::put('/update/{id}/estimation', [PenyeliaInsituOrderController::class, 'updateEstimation'])->name('update_estimation');
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
                Route::get('/alkes-handover', [PetugasInternalOrderController::class, 'alkesHandOverPage'])->name('alkes-handover');
                Route::put('/alkes-handover-store', [PetugasInternalOrderController::class, 'alkesHandOverStore'])->name('alkes-handover-store');
                Route::get('/alkes-handover-print', [PetugasInternalOrderController::class, 'alkesHandOverPrint'])->name('alkes-handover-print');
            });

            Route::prefix('worksheet')->name('worksheet.')->group(function(){
                Route::get('/', [PetugasInternalOrderController::class, 'worksheet'])->name('index');
                Route::prefix('{order_id}')->group(function(){
                    Route::get('/', [WorksheetController::class, 'index'])->name('alkes-order');
                    Route::get('/alkes-insert', [WorksheetController::class, 'insert'])->name('alkes-insert');
                    Route::post('/alkes-append', [WorksheetController::class, 'appendAlkes'])->name('alkes-append');
                    Route::put('/finishing', [WorksheetController::class, 'finishing'])->name('finishing');
                    Route::prefix('/{alkes_order_id}')->name('excel.')->group(function(){
                        Route::get('/', [WorksheetController::class, 'excelWorksheet'])->name('index');
                        Route::post('/', [WorksheetController::class, 'store'])->name('store');
                        Route::get('/edit', [WorksheetController::class, 'edit'])->name('edit');
                        Route::put('/update', [WorksheetController::class, 'update'])->name('update');
                        Route::get('/result', [WorksheetController::class, 'result'])->name('result');
                        Route::get('/certificate', [WorksheetController::class, 'certificate'])->name('certificate');
                    });
                });
            });
        });

        // Order External
        Route::prefix('insitu')->name('insitu.')->group(function(){
            Route::prefix('worksheet')->name('worksheet.')->group(function(){
                Route::get('/', [PetugasInsituOrderController::class, 'index'])->name('index');
                Route::prefix('{order_id}')->group(function(){
                    Route::get('/', [WorksheetController::class, 'index'])->name('alkes-order');
                    Route::get('/alkes-insert', [WorksheetController::class, 'insert'])->name('alkes-insert');
                    Route::post('/alkes-append', [WorksheetController::class, 'appendAlkes'])->name('alkes-append');
                    Route::put('/finishing', [WorksheetController::class, 'finishing'])->name('finishing');
                    Route::prefix('/{alkes_order_id}')->name('excel.')->group(function(){
                        Route::get('/', [WorksheetController::class, 'excelWorksheet'])->name('index');
                        Route::post('/', [WorksheetController::class, 'store'])->name('store');
                        Route::get('/edit', [WorksheetController::class, 'edit'])->name('edit');
                        Route::put('/update', [WorksheetController::class, 'update'])->name('update');
                        Route::get('/result', [WorksheetController::class, 'result'])->name('result');
                        Route::get('/certificate', [WorksheetController::class, 'certificate'])->name('certificate');
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
            Route::get('/', [BendaharaInternalOrderController::class, 'index'])->name('index');
            Route::prefix('{id}')->group(function(){
                Route::get('confirm-payment', [BendaharaInternalOrderController::class, 'confirmPayment'])->name('confirm-payment');
            });
        });
    
        Route::prefix('insitu')->name('insitu.')->group(function(){
            Route::get('/', [BendaharaInsituOrderController::class, 'index'])->name('index');
            Route::prefix('{id}')->group(function(){
                Route::get('confirm-payment', [BendaharaInsituOrderController::class, 'confirmPayment'])->name('confirm-payment');
            });
        });
    });
});