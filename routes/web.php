<?php

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
    return view('auth.login');
});
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('task/completed', [App\Http\Controllers\TaskController::class, 'completed'])->name('task.completed');
    Route::get('task/deletedAll', [App\Http\Controllers\TaskController::class, 'destroyAll'])->name('task.deletedAll');
    Route::get('task/{task}/completed', [App\Http\Controllers\TaskController::class, 'updateStatusTask'])->name('task.updateStatus');
    Route::resource('task', App\Http\Controllers\TaskController::class)->except('show');
    Route::resource('user', App\Http\Controllers\UserController::class)->except('show');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

