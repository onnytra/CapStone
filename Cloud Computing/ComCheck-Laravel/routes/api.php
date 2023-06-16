<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChannelsosmedController;
use App\Http\Controllers\AnasentiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route :: controller('user', UserController::class)->group(function(){
    Route::resource('user', UserController::class);
});
Route :: controller('channel', ChannelsosmedController::class)->group(function(){
    Route::resource('channel', ChannelsosmedController::class);
    Route::get('channel/user/{id}', [ChannelsosmedController::class, 'showbyuser']);
});
Route :: controller('anasenti', AnasentiController::class)->group(function(){
    Route::resource('anasenti', AnasentiController::class);
    Route::get('anasenti/channel/{id}', [AnasentiController::class, 'showbychannel']);
});