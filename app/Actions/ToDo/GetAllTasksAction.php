<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class GetAllTasksAction
{
    public function execute($perPage = 10)
    {
        return Task::paginate($perPage);
    }

}
