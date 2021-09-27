<?php

use App\Http\Controllers\CartController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user-create' , function (Request $request) {
    User::create([
        'name' => 'Trust Musikiri',
        'email' => 'pauro@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('pauro@12345')
    ]);
});

Route::get('/login',
    function (Request $request) {
//        $details = [
//            'email' => 'devcs@gmail.com',
//            'password' => 'pauro@12345'
//        ];

        $details = request()->only(['email' , 'password']);

        return  auth()->attempt($details);

    });

Route::middleware('auth:api')->get('/me' , function () {
    return auth()->user();
});

Route::apiResource('cart' , CartController::class)->middleware('auth');
