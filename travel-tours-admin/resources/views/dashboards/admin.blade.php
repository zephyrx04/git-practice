<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul class="list-disc ml-6 space-y-2">
                        <li>User stats, logs, pending approvals</li>
                        <li>Legal alerts</li>
                        <li>Visitor history search</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
