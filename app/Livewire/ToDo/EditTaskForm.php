<?php

namespace App\Livewire\ToDo;

use App\Models\Task;
use App\Services\TaskService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditTaskForm extends Component
{
    use LivewireAlert;

    public $task;
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

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
    }

    public function submit()
    {
        $this->validate();

        $this->taskService->updateTask($this->task, [
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->dispatch('taskUpdated');
        $this->alert('success', 'Task updated successfully!');
    }

    public function render()
    {
        return view('livewire.to-do.edit-task-form');
    }
}

