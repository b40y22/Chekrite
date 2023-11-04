<?php
declare(strict_types=1);

use App\Http\Controllers\Tasks\TaskActivateController;
use App\Http\Controllers\Tasks\TaskCloseController;
use App\Http\Controllers\Tasks\TaskDeleteController;
use App\Http\Controllers\Tasks\TaskGetController;
use App\Http\Controllers\Tasks\TasksArchiveListController;
use App\Http\Controllers\Tasks\TasksListController;
use App\Http\Controllers\Tasks\TaskStoreController;
use App\Http\Controllers\Tasks\TaskUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/task')->group(function () {
    Route::get('/activate/{id}',     [TaskActivateController::class, '__invoke'])->name('task.close');
    Route::get('/close/{id}',     [TaskCloseController::class, '__invoke'])->name('task.close');
    Route::delete('/{id}',  [TaskDeleteController::class, '__invoke'])->name('task.delete');
    Route::get('/{id}',     [TaskGetController::class, '__invoke'])->name('task.get');
    Route::post('/',        [TaskStoreController::class, '__invoke'])->name('task.store');
    Route::put('/',         [TaskUpdateController::class, '__invoke'])->name('task.update');
});
Route::get('/tasks',            [TasksListController::class, '__invoke'])->name('task.list');
Route::get('/tasks/archive',    [TasksArchiveListController::class, '__invoke'])->name('task.list');
