<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::controller(FolderController::class)->group(function () {
    Route::get('/folders/create', 'create');
    Route::post('/folders', 'store');
});
