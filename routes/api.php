<?php

use App\Http\Controllers\API\AlkesController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/category/{id}/alkes', [AlkesController::class, 'getAlkesByCategoryId']);
Route::get('/alkes/{id}/price', [AlkesController::class, 'getPriceByAlkesId']);

Route::prefix('order')->group(function(){
    Route::put('/{id}/order_number', [OrderController::class, 'updateExternalOrderNumber']);
    Route::put('/{id}/accomodation', [OrderController::class, 'updateAccomodationExternalOrder']);
    Route::put('/{id}/out_order_number', [OrderController::class, 'updateOutLetterNumberExternalOrder']);
    Route::put('/{id}/sendOfferingLetter', [OrderController::class, 'sendOfferingLetterToFasyenkes']);
    Route::put('/{id}/updateStatusToAccepted', [OrderController::class, 'updateStatusToAccepted']);
    Route::put('/{id}/updateStatusTodeparture', [OrderController::class, 'updateStatusTodeparture']);
});