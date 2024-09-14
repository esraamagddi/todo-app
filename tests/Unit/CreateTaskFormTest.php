<?php

namespace Tests\Unit;

use App\Actions\ToDo\CreateTaskAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;


class CreateTaskFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     * @test
     */

    public function test_it_creates_a_task()
    {
        $user = User::factory()->create();
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
            'user_id' => $user->id, 
        ];



        $action = new CreateTaskAction();
        $task = $action->execute($data);

        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
        $this->assertEquals('Test Task', $task->title);
    }
}
