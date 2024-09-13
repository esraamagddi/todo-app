<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">All Tasks</h3>

    <!-- Card Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <div>
                        <input type="checkbox" wire:click="toggleStatus({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                        <span class="{{ $task->completed ? 'line-through text-green-500' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>
                    <h4 class="text-lg font-semibold mb-2 text-gray-800">{{ $task->title }}</h4>
                    <p class="text-gray-600 mb-4">{{ $task->description ?: 'No description' }}</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium {{ $task->completed ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                </div>
                <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-end space-x-2">
                    <button wire:click="setSelectedTask({{ $task->id }})" class="bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg px-4 py-2 text-sm font-medium">
                        View
                    </button>

                    <button wire:click="setSelectedTask({{ $task->id }})" class="bg-yellow-500 text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 rounded-lg px-4 py-2 text-sm font-medium">
                        Edit
                    </button>

                    <button wire:click="deleteTask({{ $task->id }})" class="bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 rounded-lg px-4 py-2 text-sm font-medium">
                        Delete
                    </button>
                </div>

            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">No tasks available</div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
</div>
