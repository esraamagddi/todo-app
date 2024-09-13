<?php

namespace App\Actions\ToDo;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class GetAllTasksAction
{
    public function execute($perPage = 6)
    {
        return Task::where('user_id', Auth::id())->paginate($perPage);

    }

}
