<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(TaskController::class)->group(function () {
    Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/folders/{id}/tasks/create', 'create')->name('tasks.create');
    Route::post('/folders/{id}/tasks/', 'store')->name('tasks.store');
});


Route::controller(FolderController::class)->group(function () {
    Route::get('/folders/create', 'create');
    Route::post('/folders', 'store');
});
