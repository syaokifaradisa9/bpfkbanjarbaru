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
Route::put('/order/{id}/order_number', [OrderController::class, 'updateExternalOrderNumber']);