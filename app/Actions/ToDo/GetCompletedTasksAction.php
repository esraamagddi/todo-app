<?php

namespace App\Actions\ToDo;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class GetCompletedTasksAction
{
    public function execute($perPage = 6)
    {
        return Task::where('user_id', Auth::id())->where('completed', true)->paginate($perPage);
    }
}
