<?php
namespace App\Services;

use App\Actions\ToDo\CreateTaskAction;
use App\Actions\ToDo\GetAllTasksAction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TaskService
{
    protected $createTaskAction;
    protected $getAllTasksAction;

    public function __construct(CreateTaskAction $createTaskAction,GetAllTasksAction $getAllTasksAction)
    {
        $this->createTaskAction = $createTaskAction;
        $this->getAllTasksAction = $getAllTasksAction;

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



}
