<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Group of routes
Route::group(['prefix' =>'v1'], function()
{

    //Routes accounts
    Route::group(['prefix' => 'accounts'], function(){
        Route::get('/',[AccountController::class,'index']);
        Route::get('/search',[AccountController::class,'show']); //http://127.0.0.1:8000/api/v1/accounts/search?name[eq]=Keven%20McDermott
        Route::get('/search/{id}',[AccountController::class,'showId']);
    });


    // Route::apiResource('accounts',AccountController::class);
    Route::apiResource('users',UserController::class);
});
