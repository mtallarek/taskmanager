<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('statuses', StatusController::class)->only(['index', 'show']);

    Route::apiResource('tasks', TaskController::class)->except(['update']);
    Route::put('tasks/{task}', [TaskController::class, 'update']);
});
