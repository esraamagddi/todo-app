<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-xl font-semibold mb-4">All Tasks</h3>
    <table class="min-w-full bg-white">
        <thead>
            <tr class="w-full bg-gray-200 text-left">
                <th class="py-2 px-4">Title</th>
                <th class="py-2 px-4">Description</th>
                <th class="py-2 px-4">Completed</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $task->title }}</td>
                    <td class="py-2 px-4">{{ $task->description }}</td>
                    <td class="py-2 px-4">{{ $task->completed ? 'Yes' : 'No' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-2 px-4 text-center text-gray-500">No tasks available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
