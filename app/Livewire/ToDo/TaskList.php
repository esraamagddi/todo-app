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

    public $perPage = 10;

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


    public function render()
    {
        $tasks = Task::where('user_id', Auth::id())
                     ->orderBy('created_at', 'desc')
                     ->paginate(6);

        return view('livewire.to-do.task-list', ['tasks' => $tasks]);
    }
}
