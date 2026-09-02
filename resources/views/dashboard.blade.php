<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900">Dashboard</h2>
        <p class="mt-1 text-sm text-gray-500">A quick overview of your tutoring business.</p>
    </x-slot>

    {{-- Stat cards (placeholder values until students & payments are built) --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['label' => 'Active Students', 'value' => '0', 'icon' => 'students', 'accent' => 'bg-indigo-50 text-indigo-600'],
            ['label' => 'Paid This Month', 'value' => '0', 'icon' => 'payments', 'accent' => 'bg-emerald-50 text-emerald-600'],
            ['label' => 'Pending Payments', 'value' => '0', 'icon' => 'bell', 'accent' => 'bg-amber-50 text-amber-600'],
            ['label' => 'Collected This Month', 'value' => '$0', 'icon' => 'reports', 'accent' => 'bg-rose-50 text-rose-600'],
        ] as $stat)
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">{{ $stat['label'] }}</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $stat['value'] }}</p>
                    </div>
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg {{ $stat['accent'] }}">
                        <x-icon name="{{ $stat['icon'] }}" class="h-5 w-5" />
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 grid grid-cols-1 gap-5 lg:grid-cols-3">
        {{-- Chart (Chart.js, placeholder data) --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:col-span-2">
            <div class="flex items-center justify-between">
                <h3 class="text-sm font-semibold text-gray-900">Payments Collected</h3>
                <span class="text-xs text-gray-400">placeholder data</span>
            </div>
            <div class="mt-4 h-64">
                <canvas id="payments-chart"></canvas>
            </div>
        </div>

        {{-- Recent activity (empty state) --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <h3 class="text-sm font-semibold text-gray-900">Recent Activity</h3>
            <div class="mt-4 flex flex-col items-center justify-center rounded-lg border border-dashed border-gray-300 py-12 text-center">
                <x-icon name="reports" class="h-8 w-8 text-gray-300" />
                <p class="mt-2 text-sm font-medium text-gray-600">No activity yet</p>
                <p class="mt-1 max-w-xs text-xs text-gray-400">Payments you record will show up here.</p>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const canvas = document.getElementById('payments-chart');

                if (!canvas || typeof window.Chart === 'undefined') {
                    return;
                }

                // Placeholder data — replaced once the payments module is built.
                new window.Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Collected',
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                            borderColor: '#4f46e5',
                            backgroundColor: 'rgba(79, 70, 229, 0.10)',
                            fill: true,
                            tension: 0.3,
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                        },
                        scales: {
                            y: { beginAtZero: true },
                        },
                    },
                });
            });
        </script>
    @endpush
</x-app-layout>
