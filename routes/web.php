<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Retrieve index() view
Route::get('/', [TicketController::class, 'index'])->middleware('auth');

// Show create a ticket form
Route::get('/tickets/create', [TicketController::class, 'create']);

// Submit support ticket
Route::post('/tickets', [TicketController::class, 'store']);

// Delete ticket
Route::get('/tickets/delete/{ticket}', [TicketController::class, 'destroy']);

// Show assigned ticket
Route::get('/tickets/assigned', [TicketController::class, 'show_assigned']);

// Store response and email ticket author that they have received a response
Route::post('/tickets/assigned/{ticket}/email/response', [TicketController::class, 'respond']);

// Close selected ticket
Route::get('/tickets/close/{ticket}', [TicketController::class, 'close']);

// Show selected ticket
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

// Show register page
Route::get('/register', [UserController::class, 'create']);

// Register user
Route::post('/user/register', [UserController::class, 'register']);

// Show default login page
Route::get('/login', [UserController::class, 'login'])->name('login');

// Log user in
Route::post('/login/user', [UserController::class, 'authenticate']);

// Log user out
Route::get('/logout', [UserController::class, 'logout']);