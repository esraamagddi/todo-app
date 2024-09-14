<?php

namespace Tests\Unit;

use App\Actions\ToDo\DeleteTaskAction;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DeleteTaskActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    /** @test */
    public function it_can_delete_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $action = new DeleteTaskAction();
        $action->execute($task->id);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
