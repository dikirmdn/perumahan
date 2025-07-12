<nav class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50 transition-all duration-300" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-20">
            <!-- Logo dan Menu Utama -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">FindUrHouse</span>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:ml-10 lg:flex lg:space-x-1">
                    <a href="{{ route('home') }}" 
                       class="{{ request()->routeIs('home') ? 'bg-blue-600/80 text-white border-blue-600/80' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 border-transparent' }} 
                              inline-flex items-center px-4 py-2 rounded-lg border-2 text-sm font-medium transition-all duration-300 hover:scale-105">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                    <a href="{{ route('houses.index') }}" 
                       class="{{ request()->routeIs('houses.*') ? 'bg-blue-600/80 text-white border-blue-600/80' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 border-transparent' }} 
                              inline-flex items-center px-4 py-2 rounded-lg border-2 text-sm font-medium transition-all duration-300 hover:scale-105">
                        <i class="fas fa-building mr-2"></i>
                        Daftar Rumah
                    </a>
                    <a href="{{ route('ruko.index') }}" 
                       class="{{ request()->routeIs('ruko.*') ? 'bg-blue-600/80 text-white border-blue-600/80' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 border-transparent' }} 
                              inline-flex items-center px-4 py-2 rounded-lg border-2 text-sm font-medium transition-all duration-300 hover:scale-105">
                        <i class="fas fa-store mr-2"></i>
                        Daftar Ruko
                    </a>
                    <a href="/about" 
                       class="{{ request()->routeIs('about') ? 'bg-blue-600/80 text-white border-blue-600/80' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900 border-transparent' }} 
                              inline-flex items-center px-4 py-2 rounded-lg border-2 text-sm font-medium transition-all duration-300 hover:scale-105">
                        <i class="fas fa-info-circle mr-2"></i>
                        Tentang Kami
                    </a>
                </div>
            </div>

            <!-- Menu Kanan -->
            <div class="flex items-center space-x-4">
                <!-- Search - Desktop -->
                {{-- <div class="hidden md:block">
                    <form action="{{ route('houses.index') }}" method="GET" class="flex items-center">
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   placeholder="Cari rumah..." 
                                   class="w-64 pl-10 pr-4 py-2 text-sm bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-500 transition-all duration-300">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button type="submit" class="ml-2 p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-300 hover:scale-110">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div> --}}

                <!-- Auth Menu -->
                @auth
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" 
                                class="flex items-center text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <span class="hidden sm:block font-medium text-gray-800">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300" :class="{ 'rotate-180': userMenuOpen }"></i>
                        </button>
                        
                        <div x-show="userMenuOpen" 
                             @click.away="userMenuOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg py-2 z-50 border border-gray-200"
                             style="display: none;">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-user-circle mr-3"></i>
                                Profil
                            </a>
                            <a href="{{ route('bookings.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-calendar-check mr-3"></i>
                                Booking Saya
                            </a>
                            <div class="border-t border-gray-100 mt-2 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="/login" class="flex items-center text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg transition-all duration-300 hover:scale-105">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        <span class="hidden sm:block">Masuk</span>
                    </a>
                @endauth

                <!-- Mobile menu button -->
                <div class="flex items-center lg:hidden">
                    <button type="button" 
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars text-xl" x-show="!mobileMenuOpen"></i>
                        <i class="fas fa-times text-xl" x-show="mobileMenuOpen"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="lg:hidden" 
         x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         @click.away="mobileMenuOpen = false" 
         style="display: none;">
        <div class="bg-white shadow-lg border-t border-gray-200">
            {{-- <!-- Mobile Search -->
            <div class="px-4 py-3 border-b border-gray-100">
                <form action="{{ route('houses.index') }}" method="GET" class="flex items-center">
                    <div class="relative flex-1">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari rumah..." 
                               class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <button type="submit" class="ml-2 p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div> --}}
            
            <!-- Mobile Menu Items -->
            <div class="py-2">
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') ? 'bg-blue-50/80 border-blue-500/80 text-blue-700' : 'border-transparent text-gray-700 hover:bg-gray-50' }} 
                          flex items-center px-4 py-3 border-l-4 transition-colors duration-200">
                    <i class="fas fa-home mr-3 text-lg"></i>
                    <span class="font-medium">Beranda</span>
                </a>
                <a href="{{ route('houses.index') }}" 
                   class="{{ request()->routeIs('houses.*') ? 'bg-blue-50/80 border-blue-500/80 text-blue-700' : 'border-transparent text-gray-700 hover:bg-gray-50' }} 
                          flex items-center px-4 py-3 border-l-4 transition-colors duration-200">
                    <i class="fas fa-building mr-3 text-lg"></i>
                    <span class="font-medium">Daftar Rumah</span>
                </a>
                <a href="{{ route('ruko.index') }}" 
                   class="{{ request()->routeIs('ruko.*') ? 'bg-blue-50/80 border-blue-500/80 text-blue-700' : 'border-transparent text-gray-700 hover:bg-gray-50' }} 
                          flex items-center px-4 py-3 border-l-4 transition-colors duration-200">
                    <i class="fas fa-store mr-3 text-lg"></i>
                    <span class="font-medium">Daftar Ruko</span>
                </a>
                <a href="/about" 
                   class="{{ request()->routeIs('about') ? 'bg-blue-50/80 border-blue-500/80 text-blue-700' : 'border-transparent text-gray-700 hover:bg-gray-50' }} 
                          flex items-center px-4 py-3 border-l-4 transition-colors duration-200">
                    <i class="fas fa-info-circle mr-3 text-lg"></i>
                    <span class="font-medium">Tentang Kami</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Spacer untuk mengompensasi navbar fixed -->
<div class="h-16 lg:h-20"></div> 