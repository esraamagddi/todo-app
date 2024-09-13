<?php

namespace App\Livewire\ToDo;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    use WithPagination;

    public $perPage = 10;

    protected $taskService;

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

    public function render()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->paginate(6);

        return view('livewire.to-do.task-list', ['tasks' => $tasks]);
    }
}
