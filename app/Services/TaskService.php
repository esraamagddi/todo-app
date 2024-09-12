<?php
namespace App\Services;

use App\Actions\ToDo\CreateTaskAction;

class TaskService
{
    protected $createTaskAction;

    public function __construct(CreateTaskAction $createTaskAction)
    {
        $this->createTaskAction = $createTaskAction;
    }

    public function createTask(array $data)
    {
        return $this->createTaskAction->execute($data);
    }
}
