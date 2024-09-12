<?php

use App\Livewire\ToDo\CreateTaskForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/tasks/create', CreateTaskForm::class)->name('tasks.create');

require __DIR__.'/auth.php';
