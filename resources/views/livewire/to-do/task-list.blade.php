<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">All Tasks</h3>

    <!-- Card Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2 text-gray-800">{{ $task->title }}</h4>
                    <p class="text-gray-600 mb-4">{{ $task->description ?: 'No description' }}</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium {{ $task->completed ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                </div>
                <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-end space-x-2">
                    <button wire:click="setSelectedTask({{ $task->id }})" class="text-blue-500 hover:text-blue-700">View</button>
                    <button wire:click="setSelectedTask({{ $task->id }})" class="text-yellow-500 hover:text-yellow-700">Edit</button>
                    <button wire:click="deleteTask({{ $task->id }})" class="text-red-500 hover:text-red-700">Delete</button>
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
