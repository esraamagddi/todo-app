<?php

namespace App\Services;


use App\Actions\ToDo\ChangeTaskStatusAction;
use App\Actions\ToDo\CreateTaskAction;
use App\Actions\ToDo\DeleteTaskAction;
use App\Actions\ToDo\GetAllTasksAction;
use App\Actions\ToDo\GetCompletedTasksAction as ToDoGetCompletedTasksAction;
use App\Actions\ToDo\GetPendingTasksAction as ToDoGetPendingTasksAction;
use App\Actions\ToDo\UpdateTaskAction;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TaskService
{
    protected $createTaskAction;
    protected $getAllTasksAction;
    protected $updateTaskAction;
    protected $changeTaskStatusAction;
    protected $deleteTaskAction;
    protected $getCompletedTasksAction;
    protected $getPendingTasksAction;
    public function __construct(CreateTaskAction $createTaskAction, GetAllTasksAction $getAllTasksAction,
     UpdateTaskAction $updateTaskAction,ChangeTaskStatusAction $changeTaskStatusAction,
     DeleteTaskAction $deleteTaskAction,
     ToDoGetCompletedTasksAction $getCompletedTasksAction,
        ToDoGetPendingTasksAction $getPendingTasksAction)
    {
        $this->createTaskAction = $createTaskAction;
        $this->getAllTasksAction = $getAllTasksAction;
        $this->updateTaskAction = $updateTaskAction;
        $this->changeTaskStatusAction = $changeTaskStatusAction;
        $this->deleteTaskAction = $deleteTaskAction;
        $this->getCompletedTasksAction = $getCompletedTasksAction;
        $this->getPendingTasksAction = $getPendingTasksAction;
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
        return $this->updateTaskAction->execute($task, $data);
    }

    public function changeTaskStatus(Task $task)
    {
        return $this->changeTaskStatusAction->execute($task);
    }

    public function deleteTask($taskId)
    {
        return $this->deleteTaskAction->execute($taskId);
    }

    public function getCompletedTasks($perPage = 6)
    {
        return $this->getCompletedTasksAction->execute($perPage);
    }

    public function getPendingTasks($perPage = 6)
    {
        return $this->getPendingTasksAction->execute($perPage);
    }
}
