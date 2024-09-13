<?php
namespace App\Services;

use App\Actions\ToDo\CreateTaskAction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TaskService
{
    protected $createTaskAction;

    public function __construct(CreateTaskAction $createTaskAction)
    {
        $this->createTaskAction = $createTaskAction;
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

}
