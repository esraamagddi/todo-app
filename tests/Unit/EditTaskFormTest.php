<?php

namespace Tests\Unit;

use App\Livewire\ToDo\EditTaskForm;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class EditTaskFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_edit_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        Livewire::test(EditTaskForm::class, ['task' => $task])
            ->set('title', 'Updated Task Title')
            ->set('description', 'Updated task description.')
            ->call('submit')
            ->assertDispatched('taskUpdated');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task Title',
            'description' => 'Updated task description.',
        ]);
    }
}
