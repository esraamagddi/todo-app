<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <livewire:to-do.task-list />
        </div>
    </div>
</x-app-layout>
