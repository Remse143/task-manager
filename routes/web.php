<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', [TasksController::class, 'index'])
    ->name('tasks.index');

Route::get('/tasks/create', [TasksController::class, 'create'])
    ->name('tasks.create');

Route::post('/tasks', [TasksController::class, 'store'])
    ->name('tasks.store');

Route::get('/tasks/{task}', [TasksController::class, 'show'])
    ->name('tasks.show');

Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])
    ->name('tasks.edit');

Route::put('/tasks/{task}', [TasksController::class, 'update'])
    ->name('tasks.update');

Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])
    ->name('tasks.destroy');

Route::put('/tasks/{task}/complete', [TasksController::class, 'complete'])
    ->name('tasks.complete');