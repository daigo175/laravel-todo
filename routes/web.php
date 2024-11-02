<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

Route::get('/', function () {
    return view('welcome');
});
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
