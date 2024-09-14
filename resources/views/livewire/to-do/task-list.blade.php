<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">All Tasks</h3>

    <!-- Filter Buttons -->
    <div class="mb-4">
        <button wire:click="setFilter('all')" class="bg-gray-500 text-white hover:bg-gray-600 rounded-lg px-4 py-2 text-sm">
            All
        </button>
        <button wire:click="setFilter('completed')" class="bg-green-500 text-white hover:bg-green-600 rounded-lg px-4 py-2 text-sm">
            Completed
        </button>
        <button wire:click="setFilter('pending')" class="bg-red-500 text-white hover:bg-red-600 rounded-lg px-4 py-2 text-sm">
            Pending
        </button>
    </div>

    <!-- Task Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden" wire:key="task-{{ $task->id }}">
                <div class="p-4">
                    <div>
                        <!-- Task Checkbox -->
                        <input type="checkbox" wire:click="toggleStatus({{ $task->id }})" {{ $task->completed ? 'checked' : '' }}>
                        <span class="{{ $task->completed ? 'line-through text-green-500' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <!-- Task Details -->
                    <h4 class="text-lg font-semibold mb-2 text-gray-800">{{ $task->title }}</h4>
                    <p class="text-gray-600 mb-4">{{ $task->description ?: 'No description' }}</p>
                    <span class="inline-block px-2 py-1 text-xs font-medium {{ $task->completed ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                </div>

                <!-- Action Buttons -->
                <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-center space-x-2">
                    <a href="{{ route('edit', ['task' => $task->id]) }}" class="bg-yellow-500 text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 rounded-lg px-4 py-2 text-sm font-medium">
                        Edit
                    </a>

                    <!-- Custom Delete Confirmation Modal -->
                    <div x-data="{ showConfirmModal: false }">
                        <button @click="showConfirmModal = true" class="bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 rounded-lg px-4 py-2 text-sm font-medium">
                            Delete
                        </button>

                        <!-- Confirmation Modal -->
                        <div x-show="showConfirmModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                                <!-- Modal Content -->
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Confirm Deletion
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Are you sure you want to delete this task? This action cannot be undone.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button wire:click="deleteTask({{ $task->id }})" @click="showConfirmModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Yes, Delete
                                        </button>
                                        <button @click="showConfirmModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Delete Confirmation Modal -->
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
