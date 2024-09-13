<?php

namespace App\Actions\ToDo;

use App\Models\Task;

class GetPendingTasksAction
{
    public function execute($perPage = 6)
    {
        return Task::where('completed', 0)->paginate($perPage);
    }
}
