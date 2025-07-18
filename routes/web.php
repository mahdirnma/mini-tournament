<?php

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
    Route::get('/tournaments',[TournamentController::class,'index'])->name('tournaments.index');

});

