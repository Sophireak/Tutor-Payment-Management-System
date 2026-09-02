<header class="sticky top-0 z-20 flex h-16 items-center gap-3 border-b border-gray-200 bg-white px-4 sm:px-6 lg:px-8">
    {{-- Mobile: open the sidebar --}}
    <button type="button" class="rounded-md p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 lg:hidden" @click="sidebarOpen = true">
        <span class="sr-only">Open sidebar</span>
        <x-icon name="menu" class="h-6 w-6" />
    </button>

    {{-- Page title --}}
    <h1 class="truncate text-lg font-semibold text-gray-900">{{ $title ?? 'Dashboard' }}</h1>

    <div class="ml-auto flex items-center gap-2">
        {{-- Search (placeholder for a future global search) --}}
        <div class="relative hidden sm:block">
            <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" />
            <input type="search" placeholder="Search…"
                   class="w-48 rounded-md border border-gray-300 bg-gray-50 py-1.5 pl-9 pr-3 text-sm text-gray-700 placeholder:text-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 lg:w-64">
        </div>

        {{-- Notifications (placeholder) --}}
        <button type="button" class="rounded-md p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
            <span class="sr-only">Notifications</span>
            <x-icon name="bell" class="h-5 w-5" />
        </button>

        {{-- User menu --}}
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button type="button" class="flex items-center gap-2 rounded-md p-1.5 hover:bg-gray-100" @click="open = ! open">
                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-sm font-semibold text-white">
                    {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                </span>
                <span class="hidden text-sm font-medium text-gray-700 sm:block">{{ Auth::user()->name }}</span>
                <x-icon name="chevron-down" class="h-4 w-4 text-gray-400" />
            </button>

            <div x-cloak x-show="open" x-transition
                 class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5"
                 @click="open = false">
                <div class="border-b border-gray-100 px-4 py-2 sm:hidden">
                    <div class="truncate text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                    <div class="truncate text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    <x-icon name="user" class="h-4 w-4 text-gray-400" />
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50">
                        <x-icon name="log-out" class="h-4 w-4 text-gray-400" />
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
