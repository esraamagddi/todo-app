<?php

namespace Tests\Unit;

use App\Actions\ToDo\ChangeTaskStatusAction;
use App\Models\Task;
use App\Models\User;
// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangeTaskStatusActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_change_the_task_status()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id, 'completed' => false]);

        $this->actingAs($user);

        $action = new ChangeTaskStatusAction();
        $updatedTask = $action->execute($task);

        $this->assertTrue($updatedTask->completed);
    }

}
