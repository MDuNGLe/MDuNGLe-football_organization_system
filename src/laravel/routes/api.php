<?php

use App\Http\Controllers\GameMatchController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/matches', [GameMatchController::class,'index']);
Route::post('/matches', [GameMatchController::class, 'store']);

Route::get('/teams', [TeamController::class,'index']);

