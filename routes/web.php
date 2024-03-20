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

Route::group(['middleware' => [
    'set_locale'
]], function () {
    Route::get('/', function () {
        return redirect()->route('login-form');
    });
    Route::get('admin/login', [AdminAuthController::class,'loginForm'])->name('login-form');
    Route::get('admin/register', [AdminAuthController::class,'registerForm'])->name('register-form');

    Route::post('admin/login', [AdminAuthController::class,'login'])->name('admin.login');
    Route::post('admin/register', [AdminAuthController::class,'register'])->name('admin.register');
    Route::post('admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

    Route::view('pending-register','dashboard.auth.pending_register')->name('pending.register');
    Route::get('/cache', function () {
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Artisan::call('storage:link');

        dd('d');
//        return redirect()->back();
    });
});
