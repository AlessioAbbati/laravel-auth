<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guests\PageController as GuestsPageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;



Route::get('/', [GuestsPageController::class, 'home'])->name('guests.home');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminPageController::class, 'dashboard'])->name('dashboard');
        route::get('/project/trashed', [ProjectController::class, 'trashed'])->name('project.trashed');
        Route::resource('project', ProjectController::class);
        route::delete('/project/{project}/hardDelete', [ProjectController::class, 'hardDelete'])->name('project.hardDelete');
        route::post('/project/{project}/restore', [ProjectController::class, 'restore'])->name('project.restore');
        route::post('/project/{project}/cancel', [ProjectController::class, 'cancel'])->name('project.cancel');
});

Route::middleware('auth')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
