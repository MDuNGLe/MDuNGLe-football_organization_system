<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameMatchController;
use App\Http\Controllers\MatchTeamController;
use App\Http\Controllers\TeamUserController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::resource('teams', TeamController::class);
    Route::resource('fields', FieldController::class);
    Route::resource('matches', GameMatchController::class);
    Route::resource('match_team', MatchTeamController::class);
    Route::get('/matches/{match}/teams', [MatchTeamController::class, 'teams'])->name('matches.teams');
    Route::get('/match_team/{match}/create', [MatchTeamController::class, 'create'])->name('match_team.create');
    Route::get('/team_user/{match_team}/positions', [TeamUserController::class, 'positions'])->name('team_user.positions');
});

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');
