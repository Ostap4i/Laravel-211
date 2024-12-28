<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index']) ->name('home');
Route::get('/contacts', [MainController::class, 'contacts']) ->name('contacts');
Route::post('/send-email', [MainController::class, 'sendEmail']) ->name('sendEmail');
Route::get('/feedback', [MainController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [MainController::class, 'sendFeedback'])->name('sendFeedback');
