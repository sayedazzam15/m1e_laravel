<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/song',[SongController::class,'index']);

Route::get('/song/{song}',[SongController::class,'show']);

Route::post('/song',[SongController::class,'store']);

Route::put('/song',[SongController::class,'store']);

Route::post('/login',[AuthenticationController::class,'login']);


Route::get('/profile',[AuthenticationController::class,'profile'])->middleware('auth:sanctum');