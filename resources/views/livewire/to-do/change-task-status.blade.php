<div>
    <input type="checkbox" :click="toggleStatus" {{ $task->completed ? 'checked' : '' }}>
    <span class="{{ $task->completed ? 'line-through text-green-500' : '' }}">
        {{ $task->title }}
    </span>
</div>
