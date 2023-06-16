<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Client\UservController;
use Illuminate\Support\Facades\App;

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

// Route::middleware('guest')->group(function () {
    
//     Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('auths.login');
// });


    Route::get('/', [UsersController::class, 'index'])->name('projects.index');
    Route::get('/user/{id_user}', [UsersController::class, 'detailuser'])->name('projects.detail');
    Route::get('/user/channel/{id_channel}/', [UsersController::class, 'detailchannel'])->name('projects.senti');
    Route::post('/user', [UsersController::class, 'store'])->name('projects.store');
    Route::post('/user/channel', [UsersController::class, 'storechannel'])->name('projects.storechannel');
    // Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
    // Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
    // Route::get('/projects/{id}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
    // Route::put('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
    // Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');

    // Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auths.logout');

