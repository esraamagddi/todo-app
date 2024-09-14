<?php

namespace Tests\Unit;

use App\Livewire\ToDo\ChangeTaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class ChangeTaskStatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     * @test
     */

    public function test_it_toggles_task_status()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['completed' => false, 'user_id' => $user->id]);
        Livewire::actingAs($user)
            ->test(ChangeTaskStatus::class)
            ->call('toggleStatus', $task->id);

        $this->assertTrue((bool) $task->fresh()->completed);

    }
}
