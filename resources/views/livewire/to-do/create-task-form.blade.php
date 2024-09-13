<div>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" id="title" wire:model="title" class="mt-1 block w-full" required>
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea id="description" wire:model="description" class="mt-1 block w-full"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Task</button>
        </div>
    </form>
</div>

<!-- Add JavaScript to handle SweetAlert -->
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('taskAdded', function () {
            // Show SweetAlert on task added
            Swal.fire({
                title: 'Success!',
                text: 'Task created successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    });
</script>
