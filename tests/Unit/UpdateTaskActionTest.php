<?php

namespace Tests\Unit;

use App\Actions\ToDo\UpdateTaskAction;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UpdateTaskActionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *     @test

     */
    public function it_can_update_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $action = new UpdateTaskAction();
        $updatedTask = $action->execute($task, [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);

        $this->assertEquals('Updated Task', $updatedTask->title);
        $this->assertEquals('Updated Description', $updatedTask->description);
    }
}
