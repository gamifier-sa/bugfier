<?php

use App\Http\Controllers\Dashboard\{AdminAuthController,
    AdminController,
    AwardController,
    BugController,
    HomeController,
    ProjectController,
    RoleController,
    SettingController,
    StatusController,
    UserController};
use Illuminate\Support\Facades\Route;


Route::get('/change-theme-mode/{mode}',[SettingController::class,'changeMode'])->name('change-language');
Route::group([
    'prefix'      => 'dashboard',
    'as'         => 'dashboard.',
    'middleware' => [
        'auth:admin',
        'set_locale'
    ]], function () {

    Route::get('/', [HomeController::class,'home'])->name('home');

    Route::resource('roles', RoleController::class);
    Route::get('roles/{id}/admins', [RoleController::class,'admins']);
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('bugs', BugController::class);
    Route::resource('awards', AwardController::class);
    Route::resource('statuses', StatusController::class);
    Route::resource('settings', SettingController::class)->only(['index', 'store', 'changeMode']);

    Route::view('edit-profile', 'dashboard.admins.edit-profile')->name('edit-profile');
    Route::put('update-profile', [AdminController::class,'updateProfile'])->name('update-profile');
    Route::put('update-password', [AdminController::class,'updatePassword'])->name('update-password');


});

