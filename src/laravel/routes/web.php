<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameMatchController;


Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginAuth'])->name('login.auth');

});

Route::middleware('auth')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::resource('teams', TeamController::class);
    Route::resource('fields', FieldController::class);
    Route::resource('matches', GameMatchController::class);
});

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');