<?php

use App\Http\Controllers\TController;
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
Route::get('/', function () {
     return view('welcome');
});

Route::get('/q', [IndsexController::class, 'q']);

Route::get('/test', [TestController::class, 'index']);

Route::get('/gv', [TestController::class, 'gv']);

Route::any('/telegram', [TController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
