<?php

use App\Htstp\Controllers\API\AmazonCallbackController;
use App\Http\Controllers\API\AmazonCallBack;
use App\Http\Controllers\API\Lycamobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Netopia;
use App\Http\Controllers\API\LycaMobie;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'netopia'], function () {
    Route::any('/callback', [Netopia::class, 'callback'])->name('netopia-callback');
    Route::any('/webhook', [Netopia::class, 'webhook'])->name('netopia-webhook');
    Route::any('/lycamobile', [Lycamobile::class, 'index']);

});

Route::group(['prefix' => 'amazon'], function () {
    Route::any('/callback', [AmazonCallBack::class, 'index']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
