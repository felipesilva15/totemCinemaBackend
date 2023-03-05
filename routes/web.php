<?php

use Illuminate\Support\Facades\Route;
use App\Models\Film;

// Controllers
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TicketController;

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
Route::put('/films/{id}', [FilmController::class, 'update']);
Route::delete('/films/{id}', [FilmController::class, 'destroy']);

// Sessions
Route::get('/sessions', [SessionController::class, 'index']);
Route::post('/sessions', [SessionController::class, 'store']);
Route::put('/sessions/{id}', [SessionController::class, 'update']);
Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);
Route::get('/sessions/NextDays/{count}', [SessionController::class, 'findNextDays']);

// Orders
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

// Ticket Types
Route::get('/tickettypes', [TicketTypeController::class, 'index']);
Route::post('/tickettypes', [TicketTypeController::class, 'store']);
Route::put('/tickettypes/{id}', [TicketTypeController::class, 'update']);
Route::delete('/tickettypes/{id}', [TicketTypeController::class, 'destroy']);

// Seats
Route::get('/seats', [SeatController::class, 'index']);
Route::post('/seats', [SeatController::class, 'store']);
Route::put('/seats/{id}', [SeatController::class, 'update']);
Route::delete('/seats/{id}', [SeatController::class, 'destroy']);

// Tickets
Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::put('/tickets/{id}', [TicketController::class, 'update']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);
