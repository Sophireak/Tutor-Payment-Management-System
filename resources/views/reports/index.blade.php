<x-app-layout>
    <x-slot name="title">Reports</x-slot>

    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Reports</h2>
        <p class="mt-1 text-sm text-gray-500">See how your tutoring business is doing.</p>
    </x-slot>

    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <div class="flex flex-col items-center justify-center py-10 text-center">
            <span class="flex h-12 w-12 items-center justify-center rounded-full bg-rose-50 text-rose-600">
                <x-icon name="reports" class="h-6 w-6" />
            </span>
            <h3 class="mt-4 text-base font-semibold text-gray-900">Reports are coming soon</h3>
            <p class="mt-1 max-w-sm text-sm text-gray-500">
                You'll be able to view charts and summaries of payments and student activity here.
            </p>
        </div>
    </div>
</x-app-layout>
