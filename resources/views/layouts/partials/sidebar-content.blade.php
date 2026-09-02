@php
    $navigation = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'dashboard'],
        ['label' => 'Students', 'route' => 'students.index', 'icon' => 'students'],
        ['label' => 'Payments', 'route' => 'payments.index', 'icon' => 'payments'],
        ['label' => 'Reports', 'route' => 'reports.index', 'icon' => 'reports'],
    ];
@endphp

{{-- Brand --}}
<div class="flex h-16 shrink-0 items-center gap-3 border-b border-gray-200 px-6">
    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-indigo-600 text-white">
        <x-icon name="logo" class="h-5 w-5" />
    </span>
    <div class="min-w-0">
        <p class="truncate text-sm font-semibold text-gray-900">Tutor Payments</p>
        <p class="truncate text-xs text-gray-400">Management System</p>
    </div>
</div>

{{-- Navigation links --}}
<nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4">
    @foreach ($navigation as $item)
        @php $active = request()->routeIs($item['route']); @endphp

        <a href="{{ route($item['route']) }}"
           class="{{ $active
                ? 'bg-indigo-50 text-indigo-700'
                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium">
            <x-icon name="{{ $item['icon'] }}"
                    class="h-5 w-5 shrink-0 {{ $active ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}" />
            {{ $item['label'] }}
        </a>
    @endforeach
</nav>

{{-- Footer --}}
<div class="border-t border-gray-200 px-3 py-4">
    <a href="{{ route('profile.edit') }}"
       class="{{ request()->routeIs('profile.edit')
            ? 'bg-indigo-50 text-indigo-700'
            : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium">
        <x-icon name="user" class="h-5 w-5 shrink-0 {{ request()->routeIs('profile.edit') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}" />
        Profile
    </a>
</div>
