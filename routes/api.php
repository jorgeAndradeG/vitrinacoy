<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\StripePaymentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/beneficios',[ApiController::class,'beneficios']);
Route::get('/entidad_beneficios',[ApiController::class,'entidad_beneficios']);
Route::post('/login',[ApiController::class,'login']);
Route::post('/rrss',[ApiController::class,'rrss']);
Route::get('/mypes_by_categorias',[ApiController::class,'categorias_mypes']);

Route::post('stripe',[StripePaymentController::class, 'stripePost']);
