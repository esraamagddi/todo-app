<?php

use App\Livewire\ToDo\CreateTaskForm;
use App\Livewire\ToDo\TaskList;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::view('task', 'task')
    ->middleware(['auth', 'verified'])
    ->name('task');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/tasks/create', CreateTaskForm::class)->middleware(['auth'])->name('tasks.create');
Route::get('/tasks', TaskList::class)->middleware(['auth'])->name('tasks.list');
Route::get('/tasks/edit/{task}', function (Task $task) {
    return view('edit', ['task' => $task]);
})->middleware(['auth'])->name('edit');


require __DIR__.'/auth.php';
