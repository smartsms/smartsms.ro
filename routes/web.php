<?php

use App\Http\Controllers\API\AmazonCallbackController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
Route::get('/q', [IndexController::class, 'q']);

Route::get('/test', [TestController::class, 'index']);

Route::any('/telegram', [TelegramController::class, 'index']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
