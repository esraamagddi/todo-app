<?php

namespace App\Livewire\ToDo;

use App\Models\Task;
use App\Services\TaskService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateTaskForm extends Component
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'nullable|max:255',
    ];

    protected $taskService;

    public function __construct()
    {
        $this->taskService = app(TaskService::class);
    }

    public function submit()
    {
        $this->validate();

        $this->taskService->createTask([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => Auth::id(),
        ]);

        $this->reset(['title', 'description']);

        $this->dispatch('taskAdded');
        session()->flash('message', 'Task created successfully!');

    }

    public function render()
    {
        return view('livewire.to-do.create-task-form');
    }
}
