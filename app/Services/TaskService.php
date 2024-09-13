<?php

namespace App\Services;

use App\Actions\ToDo\CreateTaskAction;
use App\Actions\ToDo\GetAllTasksAction;
use App\Actions\ToDo\UpdateTaskAction;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TaskService
{
    protected $createTaskAction;
    protected $getAllTasksAction;
    protected $updateTaskAction;

    public function __construct(CreateTaskAction $createTaskAction, GetAllTasksAction $getAllTasksAction, UpdateTaskAction $updateTaskAction)
    {
        $this->createTaskAction = $createTaskAction;
        $this->getAllTasksAction = $getAllTasksAction;
        $this->updateTaskAction = $updateTaskAction;
    }

    public function createTask(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->createTaskAction->execute($data);
    }

    public function getAllTasks($perPage = 6)
    {
        return $this->getAllTasksAction->execute($perPage);
    }

    public function updateTask(Task $task, array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

}
