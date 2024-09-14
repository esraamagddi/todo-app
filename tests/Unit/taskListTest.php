<?php

namespace Tests\Unit;

use App\Livewire\ToDo\TaskList;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class taskListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_tasks()
    {
        $user = User::factory()->create();
        Task::factory()->count(5)->create(['user_id' => $user->id]);

        $this->actingAs($user);

        Livewire::test(TaskList::class)
            ->assertSee('Tasks');
    }

    /** @test */
    public function it_can_filter_tasks_by_completed()
    {
        $user = User::factory()->create();
        $completedTask = Task::factory()->create(['user_id' => $user->id, 'completed' => true]);
        $pendingTask = Task::factory()->create(['user_id' => $user->id, 'completed' => false]);

        $this->actingAs($user);

        Livewire::test(TaskList::class)
            ->set('filter', 'completed')
            ->assertSee($completedTask->title) 
            ->assertDontSee($pendingTask->title)
            ->assertSee('Completed');
    }
}
