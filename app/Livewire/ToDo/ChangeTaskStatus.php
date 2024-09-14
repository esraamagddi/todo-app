<?php

namespace App\Livewire\ToDo;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ChangeTaskStatus extends Component
{
    use WithPagination;

    public function toggleStatus($taskId)
    {
        $task = Task::find($taskId);
        if ($task && $task->user_id === Auth::id()) {
            $task->completed = !$task->completed;
            $task->save();
        }
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if ($task && $task->user_id === Auth::id()) {
            $task->delete();
        }
    }

    public function render()
    {
        $tasks = Task::where('user_id', Auth::id())->paginate(10);

        return view('livewire.to-do.task-list', [
            'tasks' => $tasks
        ]);
    }
}
