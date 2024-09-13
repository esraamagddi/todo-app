<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class DeleteTaskAction
{
    public function execute($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
    }
}
