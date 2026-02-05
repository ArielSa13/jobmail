<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo & Menu -->
            <div class="flex items-center gap-10">
                <a href="/" class="flex items-center gap-2">
                    <x-application-logo class="block h-8 w-auto fill-current text-blue-600" />
                    <span class="font-bold text-gray-800 text-lg">JobMailer</span>
                </a>

                <div class="hidden sm:flex items-center gap-6 text-sm font-medium">
                    <x-nav-link href="/" :active="request()->is('/')">
                        Kirim Lamaran
                    </x-nav-link>

                    <x-nav-link href="/templates" :active="request()->is('templates*')">
                        Templates
                    </x-nav-link>

                    <x-nav-link href="/history" :active="request()->is('history')">
                        History
                    </x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open"
                    class="p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-200">
        <div class="px-6 py-4 space-y-2 text-sm font-medium">
            <x-responsive-nav-link href="/" :active="request()->is('/')">
                Kirim Lamaran
            </x-responsive-nav-link>

            <x-responsive-nav-link href="/templates" :active="request()->is('templates*')">
                Templates
            </x-responsive-nav-link>

            <x-responsive-nav-link href="/history" :active="request()->is('history')">
                History
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-gray-200 px-6 py-4">
            <div class="text-gray-800 font-semibold">{{ Auth::user()->name }}</div>
            <div class="text-gray-500 text-sm">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>