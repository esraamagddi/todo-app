<?php

use App\Livewire\ToDo\CreateTaskForm;
use App\Livewire\ToDo\TaskList;
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
Route::get('/tasks/create', CreateTaskForm::class)->name('tasks.create');
Route::get('/tasks', TaskList::class)->name('tasks.list');

require __DIR__.'/auth.php';
