<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Models\User;
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


//User Authorisation Routes
Route::post('/create/user' , [UserController::class , 'signup']);
Route::post('/login', [UserController::class , 'login']);

Route::group(['middleware' => 'auth:api'] , function () {
    Route::get('/logged/user' , [UserController::class , 'loggedUser']);
    Route::get('/logout', [UserController::class , 'logout']);
});

//Cart Routes
Route::apiResource('cart' , CartController::class)->middleware('auth');
