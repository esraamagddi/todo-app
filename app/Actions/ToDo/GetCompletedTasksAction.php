<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class GetCompletedTasksAction
{
    public function execute($perPage = 6)
    {
        return Task::where('completed', True)->paginate($perPage);
    }
}
