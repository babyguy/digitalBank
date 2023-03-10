<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WalletController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login

Route::prefix('user')->group(function () {
    Route::post('login',[AuthController::class,'login']);
    Route::post('/create',[UserController::class, 'create']);
    
    Route::middleware('auth')->group(	function(){
        Route::get('/list',[UserController::class, 'index']);
        Route::post('/update/{id}',[UserController::class, 'update']);
        Route::get('/wallet',[WalletController::class,'showWallet']);
    });
    
});

Route::prefix('transaction')->middleware('auth')->group(function () {
    Route::post('/create',[TransactionController::class,'create']);
});

