<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ChangeTaskStatusComponent extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::where('user_id', Auth::id())->paginate(10);
    }

    public function toggleStatus($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->completed = !$task->completed;
            $task->save();
        }

        $this->tasks = Task::where('user_id', Auth::id())->paginate(10);
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
        }

        $this->tasks = Task::where('user_id', Auth::id())->paginate(10);
    }

    public function render()
    {
        return view('livewire.to-do.task-list', [
            'tasks' => $this->tasks
        ]);
    }
}
