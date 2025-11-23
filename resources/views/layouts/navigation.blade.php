
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
                <!-- Custom App Name & Logo -->
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

                <!-- Cool Animated Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <!-- Home Link -->
                    <a href="{{ route('home') }}" 
                       class="group relative px-1 py-2 text-base font-bold tracking-wide transition-colors duration-300
                              {{ request()->routeIs('home') ? 'text-emerald-700' : 'text-gray-500 hover:text-emerald-600' }}">
                        <span class="nav-glow relative z-10">Home</span>
                        <span class="absolute bottom-0 left-0 h-[3px] w-full origin-bottom-right scale-x-0 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-transform duration-300 ease-out group-hover:origin-bottom-left group-hover:scale-x-100 
                                     {{ request()->routeIs('home') ? 'scale-x-100 origin-bottom-left' : '' }}"></span>
                    </a>
                    <!-- Turfs Link -->
                    <a href="{{ route('turfs') }}" 
                       class="group relative px-1 py-2 text-base font-bold tracking-wide transition-colors duration-300
                              {{ request()->routeIs('turfs') ? 'text-emerald-700' : 'text-gray-500 hover:text-emerald-600' }}">
                        <span class="nav-glow relative z-10">Turfs</span>
                        <span class="absolute bottom-0 left-0 h-[3px] w-full origin-bottom-right scale-x-0 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-transform duration-300 ease-out group-hover:origin-bottom-left group-hover:scale-x-100
                                     {{ request()->routeIs('turfs') ? 'scale-x-100 origin-bottom-left' : '' }}"></span>
                    </a>
                    <!-- Bookings Link -->
                    <a href="{{ route('bookings') }}" 
                       class="group relative px-1 py-2 text-base font-bold tracking-wide transition-colors duration-300
                              {{ request()->routeIs('bookings') ? 'text-emerald-700' : 'text-gray-500 hover:text-emerald-600' }}">
                        <span class="nav-glow relative z-10">Bookings</span>
                        <span class="absolute bottom-0 left-0 h-[3px] w-full origin-bottom-right scale-x-0 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-transform duration-300 ease-out group-hover:origin-bottom-left group-hover:scale-x-100
                                     {{ request()->routeIs('bookings') ? 'scale-x-100 origin-bottom-left' : '' }}"></span>
                    </a>
                    <!-- Contact Link -->
                    <a href="{{ route('contact') }}" 
                       class="group relative px-1 py-2 text-base font-bold tracking-wide transition-colors duration-300
                              {{ request()->routeIs('contact') ? 'text-emerald-700' : 'text-gray-500 hover:text-emerald-600' }}">
                        <span class="nav-glow relative z-10">Contact</span>
                        <span class="absolute bottom-0 left-0 h-[3px] w-full origin-bottom-right scale-x-0 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-transform duration-300 ease-out group-hover:origin-bottom-left group-hover:scale-x-100
                                     {{ request()->routeIs('contact') ? 'scale-x-100 origin-bottom-left' : '' }}"></span>
                    </a>
                    <!-- Admin Link (retain) -->
                    @if(Auth::check())
                        <a href="{{ route('admin') }}" 
                           class="group relative px-1 py-2 text-base font-bold tracking-wide transition-colors duration-300
                                  {{ request()->routeIs('admin') ? 'text-emerald-700' : 'text-gray-500 hover:text-emerald-600' }}">
                            <span class="nav-glow relative z-10">Admin</span>
                            <span class="absolute bottom-0 left-0 h-[3px] w-full origin-bottom-right scale-x-0 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-transform duration-300 ease-out group-hover:origin-bottom-left group-hover:scale-x-100
                                         {{ request()->routeIs('admin') ? 'scale-x-100 origin-bottom-left' : '' }}"></span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- User/Guest Actions -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2" style="border-radius:24px;padding:6px 22px;font-weight:500;">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success" style="background:#1e7e34;border-radius:24px;padding:6px 22px;font-weight:500;">Sign Up</a>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::check() ? Auth::user()->email : '' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
