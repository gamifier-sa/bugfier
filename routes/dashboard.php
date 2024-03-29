<?php

use App\Http\Controllers\Dashboard\{AdminController,
    AwardController,
    BugController,
    HomeController,
    LevelController,
    ProjectController,
    RoleController,
    SettingController,
    StandUpController,
    StatusController,
    UserController};
use Illuminate\Support\Facades\Route;


Route::get('/change-theme-lang/{lang}',[SettingController::class,'changeLang'])->name('change-language');
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
    Route::get('bugs-update-exp/{id}/edit', [BugController::class, 'updateExpForm'])->name('bug.update-exp-form');
    Route::put('bug-update-exp/{id}', [BugController::class, 'updateExp'])->name('bug.exp-update');

    Route::resource('awards', AwardController::class);
    Route::resource('statuses', StatusController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('stand-ups', StandUpController::class);
    Route::resource('settings', SettingController::class)->only(['index', 'store', 'changeMode']);

    Route::view('edit-profile', 'dashboard.admins.edit-profile')->name('edit-profile');
    Route::put('update-profile', [AdminController::class,'updateProfile'])->name('update-profile');
    Route::put('update-password', [AdminController::class,'updatePassword'])->name('update-password');


});

