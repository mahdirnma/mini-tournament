<?php

use App\Http\Controllers\ResultController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('check.teams')->group(function () {
    Route::get('/teams',[TeamController::class,'index'])->name('teams.index');
    Route::post('/tournaments/{team}/store',[TournamentController::class,'store'])->name('tournaments.store');
});
Route::middleware('check.tournaments')->group(function () {
    Route::middleware('check.games')->group(function () {
        Route::get('/tournaments',[TournamentController::class,'index'])->name('tournaments.index');
        Route::post('/tournaments/create',[TournamentController::class,'create'])->name('tournaments.create');
    });
    Route::get('/results',[ResultController::class,'index'])->name('results.index');
});

