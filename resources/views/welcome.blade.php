<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RumahSejahtera - Booking Rumah Terpercaya</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-blue-600">
                                <i class="fas fa-home mr-2"></i>RumahSejahtera
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 pt-16">
            <div class="absolute inset-0">
                <img class="w-full h-full object-cover opacity-20" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80" alt="Hero background">
            </div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Temukan Rumah Impian Anda
                    </h1>
                    <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                        Booking rumah dengan mudah, aman, dan terpercaya. Pilihan rumah berkualitas dengan lokasi strategis untuk kebutuhan Anda.
                    </p>
                    <div class="mt-10">
                        <a href="#properties" class="inline-block bg-white py-3 px-8 border border-transparent rounded-md text-base font-medium text-blue-600 hover:bg-blue-50 transition duration-300">
                            Lihat Rumah Tersedia
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="bg-white py-8 shadow-md">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Cari Rumah</h2>
                    <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Semua Lokasi</option>
                                <option>Jakarta Selatan</option>
                                <option>Jakarta Pusat</option>
                                <option>Jakarta Barat</option>
                                <option>Jakarta Timur</option>
                                <option>Jakarta Utara</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Rumah</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Semua Tipe</option>
                                <option>Rumah 1 Lantai</option>
                                <option>Rumah 2 Lantai</option>
                                <option>Villa</option>
                                <option>Apartemen</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Semua Harga</option>
                                <option>< 500 Juta</option>
                                <option>500 Juta - 1 Miliar</option>
                                <option>1 Miliar - 2 Miliar</option>
                                <option>> 2 Miliar</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                                <i class="fas fa-search mr-2"></i>Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Mengapa Memilih Kami?
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Nikmati berbagai keunggulan booking rumah di platform kami
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mx-auto">
                            <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Booking Aman</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Transaksi aman dengan berbagai metode pembayaran terpercaya
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mx-auto">
                            <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Lokasi Strategis</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Pilihan rumah dengan lokasi strategis dan akses mudah
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mx-auto">
                            <i class="fas fa-headset text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Layanan 24/7</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Customer service siap membantu Anda kapan saja
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mx-auto">
                            <i class="fas fa-certificate text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">Terverifikasi</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Semua properti telah diverifikasi dan terjamin kualitasnya
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Properties Section -->
        <div id="properties" class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Rumah Tersedia
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Pilihan rumah terbaik dengan harga kompetitif
                    </p>
                </div>

                <div class="mt-12 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    <!-- Property 1 -->
                    <div class="group relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="w-full h-64 bg-gray-200 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Rumah Modern" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Rumah Modern Minimalis</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            </div>
                            <p class="text-gray-600 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jakarta Selatan</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="mr-4"><i class="fas fa-bed mr-1"></i>3 Kamar</span>
                                <span class="mr-4"><i class="fas fa-bath mr-1"></i>2 Kamar Mandi</span>
                                <span><i class="fas fa-ruler-combined mr-1"></i>150 m²</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-2xl font-bold text-blue-600">Rp 1.250.000.000</p>
                                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">
                                    Booking Sekarang
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Property 2 -->
                    <div class="group relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="w-full h-64 bg-gray-200 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2075&q=80" 
                                 alt="Villa Mewah" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Villa Mewah 2 Lantai</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            </div>
                            <p class="text-gray-600 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jakarta Pusat</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="mr-4"><i class="fas fa-bed mr-1"></i>4 Kamar</span>
                                <span class="mr-4"><i class="fas fa-bath mr-1"></i>3 Kamar Mandi</span>
                                <span><i class="fas fa-ruler-combined mr-1"></i>200 m²</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-2xl font-bold text-blue-600">Rp 2.500.000.000</p>
                                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">
                                    Booking Sekarang
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Property 3 -->
                    <div class="group relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="w-full h-64 bg-gray-200 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2053&q=80" 
                                 alt="Rumah Tipe 36" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Rumah Tipe 36</h3>
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            </div>
                            <p class="text-gray-600 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jakarta Barat</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="mr-4"><i class="fas fa-bed mr-1"></i>2 Kamar</span>
                                <span class="mr-4"><i class="fas fa-bath mr-1"></i>1 Kamar Mandi</span>
                                <span><i class="fas fa-ruler-combined mr-1"></i>36 m²</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-2xl font-bold text-blue-600">Rp 450.000.000</p>
                                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">
                                    Booking Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition duration-300">
                        Lihat Semua Rumah
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">RumahSejahtera</h3>
                        <p class="text-gray-400">
                            Platform booking rumah terpercaya dengan pilihan properti berkualitas dan lokasi strategis.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">Booking Rumah</a></li>
                            <li><a href="#" class="hover:text-white">Konsultasi</a></li>
                            <li><a href="#" class="hover:text-white">Virtual Tour</a></li>
                            <li><a href="#" class="hover:text-white">Legalitas</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Perusahaan</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white">Karir</a></li>
                            <li><a href="#" class="hover:text-white">Berita</a></li>
                            <li><a href="#" class="hover:text-white">Kontak</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                        <div class="space-y-2 text-gray-400">
                            <p><i class="fas fa-phone mr-2"></i>+62 21 1234 5678</p>
                            <p><i class="fas fa-envelope mr-2"></i>info@rumahsejahtera.com</p>
                            <p><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</p>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook text-xl"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter text-xl"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin text-xl"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 RumahSejahtera. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
