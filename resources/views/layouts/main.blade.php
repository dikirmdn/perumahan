<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CitraGarden')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @stack('styles')
</head>
<body class="bg-gray-50" style="font-family: 'Poppins', sans-serif;">
    <!-- Navbar -->
    <x-navbar />

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white ">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tentang Perumahan Kami</h3>
                    <p class="text-gray-300">Kami menyediakan hunian nyaman, aman, dan strategis untuk keluarga Anda. Temukan rumah impian Anda bersama kami.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Tipe Rumah</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Fasilitas</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Promo</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Konsultasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-300">Email: info@perumahan.com</li>
                        <li class="text-gray-300">Telepon: (021) 9876-5432</li>
                        <li class="text-gray-300">Kantor: Jl. Damai No. 10, Jakarta</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-blue-800 text-center text-gray-300">
                <p>&copy; 2025 Kelompok 5. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html> 