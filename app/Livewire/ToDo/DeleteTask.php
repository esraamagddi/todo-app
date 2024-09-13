<?php

namespace App\Livewire\ToDo;

use App\Models\Task;
use Livewire\Component;
use App\Services\TaskService;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DeleteTask extends Component
{
    use LivewireAlert;

    public $taskIdBeingDeleted;
    protected $taskService;

    protected $listeners = ['confirmDelete'];

    public function __construct()
    {
        $this->taskService = app(TaskService::class);
    }

    // This method triggers the confirmation dialog
    public function confirmDelete($taskId)
    {
        $this->taskIdBeingDeleted = $taskId;

        // Show confirmation alert
        $this->alert('question', 'Are you sure you want to delete this task?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'showCancelButton' => true,
            'cancelButtonText' => 'No, keep it',
            'onConfirmed' => 'deleteTask', // On confirmation, call deleteTask
            'onDismissed' => 'cancelDelete'
        ]);
    }

    // This method deletes the task
    public function deleteTask($taskId)
    {
        Task::findOrFail($taskId)->delete();
        $this->alert('success', 'Task deleted successfully!');
    }

    // If the user cancels the deletion
    public function cancelDelete()
    {
        $this->reset('taskIdBeingDeleted');
        $this->alert('info', 'Task deletion canceled.', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'OK'
        ]);
    }

    public function render()
    {
        return view('livewire.to-do.delete-task');
    }
}
