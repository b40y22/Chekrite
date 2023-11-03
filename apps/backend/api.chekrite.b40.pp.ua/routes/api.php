<?php

use App\Http\Controllers\Tasks\TaskDeleteController;
use App\Http\Controllers\Tasks\TaskGetController;
use App\Http\Controllers\Tasks\TasksListController;
use App\Http\Controllers\Tasks\TaskStoreController;
use App\Http\Controllers\Tasks\TaskUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/task')->group(function () {
    Route::get('/{id}',     [TaskGetController::class, '__invoke'])->name('task.get');
    Route::post('/',        [TaskStoreController::class, '__invoke'])->name('task.store');
    Route::put('/',         [TaskUpdateController::class, '__invoke'])->name('task.update');
    Route::delete('/{id}',  [TaskDeleteController::class, '__invoke'])->name('task.delete');
});
Route::get('/tasks',      [TasksListController::class, '__invoke'])->name('task.list');
