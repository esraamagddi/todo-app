<?php
namespace App\Actions\ToDo;

use App\Models\Task;

class CreateTaskAction
{
    public function execute(array $data)
    {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
        ]);

    }
}
