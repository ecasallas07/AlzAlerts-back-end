<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AccountController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\GaleryController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\ReminderController;
use App\Http\Controllers\Api\V1\VoiceNotesController;


// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "api" middleware group. Make something great!
// |
// */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Group of routes
Route::group(['prefix' =>'v1'], function()
{

    //Routes accounts
    Route::group(['prefix' => 'accounts'], function(){
        Route::get('/',[AccountController::class,'index']);
        Route::get('/search',[AccountController::class,'show']); //http://127.0.0.1:8000/api/v1/accounts/search?name[eq]=Keven%20McDermott
        Route::get('/search/{id}',[AccountController::class,'showId']);
        Route::post('/create',[AccountController::class,'store']);
        Route::delete('/delete/{id}',[AccountController::class,'destroy']);
        Route::put('/updated/{id}',[AccountController::class,'update']);
    });


    Route::group(['prefix' => 'users'], function(){
        Route::get('/',[UserController::class, 'index']);
        Route::get('/search',[UserController::class,'show']);
        Route::get('/searach/{id}',[UserController::class,'showId']);
        Route::post('/create',[UserController::class,'create']);
        Route::delete('/delete/{id}',[UserController::class,'destroy']);
        Route::put('/updated/{id}',[UserController::class,'update']);
    });

    Route::group(['prefix' => 'galeries'], function(){
        Route::get('/',[GaleryController::class,'index']);
        Route::get('/search',[GaleryController::class,'show']);
        Route::get('/search/{id}',[GaleryController::class,'showId']);
        Route::post('/create',[GaleryController::class,'create']);
        Route::delete('/delete/{id}',[GaleryController::class,'destroy']);
        Route::put('/updated/{id}',[GaleryController::class,'update']);
    });

    Route::group(['prefix'=> 'login'], function(){
        Route::post('/',[LoginController::class,'login']);
    });

    Route::group(['prefix'=> 'reminders'], function(){
        Route::get('/',[ReminderController::class,'index']);
        Route::get('/search',[ReminderController::class,'show']);
        Route::get('/search/{id}',[ReminderController::class,'showId']);
        Route::post('/create',[ReminderController::class,'create']);
        Route::delete('/delete/{id}',[ReminderController::class,'destroy']);
        Route::put('/updated/{id}',[ReminderController::class,'update']);
    });

    Route::group(['prefix'=> 'voices'], function(){
        Route::get('/',[VoiceNotesController::class,'index']);
        Route::get('/search',[VoiceNotesController::class,'show']);
        Route::get('/search/{id}',[VoiceNotesController::class,'showId']);
        Route::post('/create',[VoiceNotesController::class,'create']);
        Route::delete('/delete/{id}',[VoiceNotesController::class,'destroy']);
        Route::put('/updated/{id}',[VoiceNotesController::class,'update']);
    });

    // Routes for creating controllers more easy
    Route::apiResource('accounts',AccountController::class);
    Route::apiResource('users',UserController::class);
    Route::apiResource('galeries',GaleryController::class);
    Route::apiResource('reminders',ReminderController::class);
    Route::apiResource('voices', VoiceNotesController::class);
    Route::apiResource('logins',LoginController::class);
});





