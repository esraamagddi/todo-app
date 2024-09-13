<?php
namespace App\Actions\ToDo;

use App\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, array $data)
    {
        $task->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return $task;
    }
}
