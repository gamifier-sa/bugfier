<?php

use App\Http\Controllers\Dashboard\AdminAuthController;
use Illuminate\Support\Facades\{Artisan, Route};

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

Route::get('/', function () {
    return redirect()->route('login-form');
});
Route::get('admin/login', [AdminAuthController::class,'loginForm'])->name('login-form');
Route::post('admin/login', [AdminAuthController::class,'login'])->name('admin.login');
Route::post('admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

Route::get('/install', function () {
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    Artisan::call('storage:link');
});
