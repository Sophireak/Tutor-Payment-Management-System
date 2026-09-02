<x-app-layout>
    <x-slot name="title">Students</x-slot>

    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Students</h2>
        <p class="mt-1 text-sm text-gray-500">Manage the students you tutor.</p>
    </x-slot>

    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <div class="flex flex-col items-center justify-center py-10 text-center">
            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600">
                <x-icon name="students" class="h-6 w-6" />
            </span>
            <h3 class="mt-4 text-base font-semibold text-gray-900">Student management is coming soon</h3>
            <p class="mt-1 max-w-sm text-sm text-gray-500">
                You'll be able to add, edit, and keep track of your tutoring students from here.
            </p>
        </div>
    </div>
</x-app-layout>
