<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">
            {{ __('Add Your Task') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">
                        {{ __('Create a New Task') }}
                    </h3>
                    <livewire:to-do.create-task-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
