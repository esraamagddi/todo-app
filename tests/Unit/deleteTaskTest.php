<?php

namespace Tests\Unit;

use App\Livewire\ToDo\DeleteTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class deleteTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_a_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        Livewire::test(DeleteTask::class)
            ->call('confirmDelete', $task->id)
            ->call('deleteTask', $task->id);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);


    }

}
