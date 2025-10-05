<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AuthTaskAccess;
use App\Models\Task;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('statuses', StatusController::class)->only(['index', 'show']);

    Route::apiResource('tasks', TaskController::class)->only(['index', 'create']);

    Route::middleware(AuthTaskAccess::class)->group(function () {
        Route::get('tasks/{task}', [TaskController::class, 'show']);
        Route::patch('tasks/{task}', [TaskController::class, 'update'])->can('update', 'task');
        Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->can('delete', 'task');
        Route::get('tasks/user/{user}', [TaskController::class, 'indexByUser']);
        Route::get('tasks/project/{project}', [TaskController::class, 'indexByProject']);
    });

});
