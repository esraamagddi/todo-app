<?php

namespace App\Livewire\ToDo;

use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TaskList extends Component
{
    use WithPagination,LivewireAlert;

    public $perPage = 6;
    public $filter = 'all';
    public $taskIdBeingDeleted;
    protected $taskService;

    protected $listeners = ['taskDeleted'];
    public function __construct()
    {
        $this->taskService = app(TaskService::class);
    }

        public function toggleStatus($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->completed = !$task->completed;
            $task->save();
        }

    }
    public function deleteTask($taskId)
    {
        Task::findOrFail($taskId)->delete();
        $this->alert('success', 'Task deleted successfully!');
    }


    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function getFilteredTasks()
    {
        if ($this->filter == 'completed') {
            return $this->taskService->getCompletedTasks($this->perPage);
        } elseif ($this->filter == 'pending') {
            return $this->taskService->getPendingTasks($this->perPage);
        } else {
            return $this->taskService->getAllTasks($this->perPage);
        }
    }

    public function render()
    {
        $tasks = $this->getFilteredTasks();
        
        return view('livewire.to-do.task-list', ['tasks' => $tasks]);
    }
}
