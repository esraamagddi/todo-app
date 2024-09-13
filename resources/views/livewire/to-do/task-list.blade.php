<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">All Tasks</h3>

    <!-- Table Container -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead>
                <tr class="w-full bg-gray-100 border-b">
                    <th class="py-3 px-4 text-left text-gray-600">Title</th>
                    <th class="py-3 px-4 text-left text-gray-600">Description</th>
                    <th class="py-3 px-4 text-left text-gray-600">Completed</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr class="border-b">
                        <td class="py-3 px-4 text-gray-800">{{ $task->title }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $task->description ?: 'No description' }}</td>
                        <td class="py-3 px-4 text-gray-800">
                            <span class="inline-block px-2 py-1 text-xs font-medium {{ $task->completed ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full">
                                {{ $task->completed ? 'Completed' : 'Pending' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-3 px-4 text-center text-gray-500">No tasks available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>
</div>
