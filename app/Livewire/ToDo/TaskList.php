<?php

namespace App\Livewire\ToDo;

use Livewire\Component;
use App\Services\TaskService;

class TaskList extends Component
{
    public $tasks;

    protected $taskService;

    public function __construct()
    {
        $this->taskService = app(TaskService::class);
    }

    public function mount()
    {
        $this->tasks = $this->taskService->getAllTasks();
    }

    public function render()
    {
        return view('livewire.to-do.task-list');
    }
}
