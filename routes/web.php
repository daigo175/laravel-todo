<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(TaskController::class)->group(function () {
    Route::get('/folders/{id}/tasks', 'index')->name('tasks.index');
    Route::get('/folders/{id}/tasks/create', 'create')->name('tasks.create');
    Route::post('/folders/{id}/tasks/', 'store')->name('tasks.store');
    Route::get('/folders/{folder_id}/tasks/{task_id}/edit', 'edit')->name('tasks.edit');
    Route::post('/folders/{folder_id}/tasks/{task_id}/update', 'update')->name('tasks.update');
    Route::delete('/folders/{folder_id}/tasks/{task_id}', 'destroy')->name('tasks.delete');
});


Route::controller(FolderController::class)->group(function () {
    Route::get('/folders/create', 'create')->name('folder.create');
    Route::post('/folders', 'store');
    Route::get('/folders/{id}/edit', 'edit')->name('folder.edit');
    Route::post('/folders/{id}/update', 'update')->name('folder.update');
    Route::delete('/folders/{id}', 'destroy')->name('folder.delete');
});
