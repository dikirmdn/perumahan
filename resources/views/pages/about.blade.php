@extends('layouts.main')

@section('title', 'Tentang Kami - CitraGarden')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Tentang Kami</h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">Kami adalah tim yang berdedikasi untuk memberikan solusi terbaik bagi kebutuhan Anda</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-12 text-white" viewBox="0 0 1440 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h1440V0c-211.06 37.15-451.87 48-721.94 48C448.86 48 208.06 37.15 0 0v48z"/>
            </svg>
        </div>
    </div>

    <!-- Visi Misi Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-16">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi pemimpin dalam inovasi dan pelayanan, menciptakan dampak positif yang berkelanjutan bagi masyarakat dan lingkungan melalui solusi teknologi yang unggul.
                    </p>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Misi Kami</h2>
                    <ul class="text-gray-600 space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Memberikan layanan berkualitas tinggi
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mengembangkan solusi inovatif
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Membangun kemitraan yang berkelanjutan
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tim Kami Section -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-16">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Tim Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/team/fiqih.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800">Muhammad Fiqih</h3>
                        <p class="text-blue-600">CEO & Founder</p>
                        <p class="text-gray-600 mt-2">Berpengalaman lebih dari 10 tahun dalam industri teknologi.</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/team/tim2.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800">Ramadan Tipalahi</h3>
                        <p class="text-blue-600">CTO</p>
                        <p class="text-gray-600 mt-2">Ahli dalam pengembangan teknologi dan inovasi digital.</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/team/fiqih.png') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800">Muhammad Fiqih</h3>
                        <p class="text-blue-600">Head of Design</p>
                        <p class="text-gray-600 mt-2">Spesialis dalam UX/UI design dengan pendekatan user-centered.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">500+</div>
                    <div class="text-gray-600">Klien Puas</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">150+</div>
                    <div class="text-gray-600">Proyek Selesai</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                    <div class="text-gray-600">Tim Ahli</div>
                </div>
                <div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">10+</div>
                    <div class="text-gray-600">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Hubungi Kami</h2>
                <p class="text-gray-600 mb-8">Kami siap membantu Anda dengan solusi terbaik untuk kebutuhan bisnis Anda</p>
                <a href="/contact" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
@endsection 