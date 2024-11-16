<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\DivideController;

// ホームページのデザインを変更する
Route::get('/', function () {
    return view('welcome');
});

// ログイン後に判定して遷移先を決定する
Route::controller(DivideController::class)->group(function () {
    Route::get('/divide', 'index')->name('divide');
})->middleware(['auth', 'verified']);

// ログイン後ページにはプロフィール編集とログアウトボタンを持たせて、以下のルートは削除する
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 以下は、group全体に対して->name('divide')が適用される書き方
// Route::controller(DivideController::class)->group(function () {
//     Route::get('/divide', 'index');
// })->middleware(['auth', 'verified'])->name('divide');

Route::middleware('auth')->group(function () {
    // ミドルウェアグループ内の画面は、ログインしていないと表示されない。未ログインならログイン画面にリダイレクトされる。
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // フォルダ一覧、作成、編集、削除
    Route::get('/folders/{id}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/folders/create', [FolderController::class, 'create'])->name('folder.create');
    Route::post('/folders', [FolderController::class, 'store']);
    Route::get('/folders/{id}/edit', [FolderController::class, 'edit'])->name('folder.edit');
    Route::post('/folders/{id}/update', [FolderController::class, 'update'])->name('folder.update');
    Route::delete('/folders/{id}', [FolderController::class, 'destroy'])->name('folder.delete');

    // タスク作成、編集、削除
    Route::get('/folders/{id}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/folders/{folder_id}/tasks/{task_id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/folders/{folder_id}/tasks/{task_id}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/folders/{folder_id}/tasks/{task_id}', [TaskController::class, 'destroy'])->name('tasks.delete');
});

require __DIR__.'/auth.php';
