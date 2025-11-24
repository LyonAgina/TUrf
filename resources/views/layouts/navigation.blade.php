<style>
    @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
    @keyframes text-pulse-glow {
        0%, 100% { filter: drop-shadow(0 2px 2px rgba(0,0,0,0.1)); }
        50% { filter: drop-shadow(0 0 12px rgba(34, 197, 94, 0.7)); }
    }
    .nav-glow { transition: text-shadow 0.3s ease; }
    .group:hover .nav-glow {
        text-shadow: 0 0 15px rgba(16, 185, 129, 0.5);
    }
</style>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo + App Name -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="navbar-brand flex items-center gap-3 group" style="text-decoration: none;">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" 
                             class="transition-transform duration-300 ease-out group-hover:scale-110 group-hover:-rotate-6"
                             style="height: 42px; width: auto; filter: drop-shadow(0 4px 3px rgba(0,0,0,0.1));">
                        <span style="
                            font-family: 'Russo One', sans-serif; 
                            font-size: 1.5rem; 
                            background: linear-gradient(135deg, #022c22 0%, #15803d 50%, #16a34a 100%);
                            -webkit-background-clip: text; 
                            -webkit-text-fill-color: transparent; 
                            animation: text-pulse-glow 3s infinite ease-in-out;
                            letter-spacing: 0.5px;">
                            Turf Bila Worry
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Home
                    </x-nav-link>
                    <x-nav-link :href="route('turfs')" :active="request()->routeIs('turfs')">
                        Turfs
                    </x-nav-link>
                    <x-nav-link :href="route('bookings')" :active="request()->routeIs('bookings')">
                        My Bookings
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        Contact
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('admin.panel')" :active="request()->routeIs('admin.panel')">
                            Admin Panel
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Right Side: User Menu / Login -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="mx-2 text-sm font-semibold text-gray-700 hover:text-emerald-600 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="mx-2 px-5 py-2 bg-emerald-600 text-white font-semibold rounded-full hover:bg-emerald-700 transition">
                        Sign Up
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('turfs')" :active="request()->routeIs('turfs')">
                {{ __('Turfs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('bookings')" :active="request()->routeIs('bookings')">
                {{ __('My Bookings') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link :href="route('admin.panel')" :active="request()->routeIs('admin.panel')">
                    {{ __('Admin Panel') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive User Menu -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name ?? 'Guest' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Sign Up') }}
                    </x-responsive-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>