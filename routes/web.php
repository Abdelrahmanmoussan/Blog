<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [TaskController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [TaskController::class, 'guest'])->name('guest');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::post('review-store', [ReviewRatingController::class, 'reviewstore'])->name('review.store');

require __DIR__ . '/auth.php';
