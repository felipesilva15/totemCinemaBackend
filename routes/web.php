<?php

use Illuminate\Support\Facades\Route;
use App\Models\Film;

use App\Http\Controllers\FilmController;

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

// Films
Route::get('/films', [FilmController::class, 'index']);
Route::post('/films', [FilmController::class, 'store']);
Route::put('/films/{$id}', [FilmController::class, 'update']);
Route::delete('/films/{$id}', [FilmController::class, 'destroy']);
