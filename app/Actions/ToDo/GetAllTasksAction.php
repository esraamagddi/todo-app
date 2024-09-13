<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class GetAllTasksAction
{
    public function execute()
    {
        return Task::all();
    }
}
