<?php

namespace Tests\Unit;

use App\Actions\ToDo\CreateTaskAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
// use PHPUnit\Framework\TestCase;

class CreateTaskActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     *     @test
     */
    public function it_can_create_a_new_task()
    {
    $user = User::factory()->create();
        $this->actingAs($user);

        $action = new CreateTaskAction();
        $task = $action->execute([
            'title' => 'Test Task',
            'description' => 'Test Description',
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'user_id' => $user->id,
        ]);
    }

}
