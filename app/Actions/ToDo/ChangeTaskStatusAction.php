<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class ChangeTaskStatusAction
{
    public function execute(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return $task;
    }
}
