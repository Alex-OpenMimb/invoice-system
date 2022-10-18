<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\InvoiceController;
use App\Http\Controllers\Api\v1\SomeController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix'     => 'v1/auth'
], function () {

    Route::post('register',        [AuthController::class,'register']);
    Route::post('login',           [AuthController::class,'login']);
   
    
});



Route::group([
    'middleware' => 'api',
    'prefix'     => 'v1'

], function ($router) {

    Route::post('logout',       [AuthController::class,'logout']);
    Route::post('refresh',      [AuthController::class,'refresh']);
    Route::post('store',        [InvoiceController::class,'store']);
    
});