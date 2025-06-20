@extends('layouts.main')

@section('title', 'Beranda - CitraGarden')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-indigo-700 via-indigo-600 to-indigo-500 min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <video class="w-full h-full object-cover brightness-75" autoplay loop muted playsinline>
                <source src="{{ asset('video/banner.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-indigo-600/40"></div>
        </div>
        <div class="relative max-w-3xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white drop-shadow-2xl mb-6">
                Temukan Rumah Impian Anda
            </h1>
            <p class="mt-4 text-2xl text-indigo-100 max-w-2xl mx-auto drop-shadow-lg">
                Booking rumah dengan mudah, aman, dan terpercaya. Pilihan rumah berkualitas dengan lokasi strategis untuk kebutuhan Anda.
            </p>
            <div class="mt-10 flex justify-center">
                <a href="{{ route('houses.index') }}" class="inline-block bg-white py-4 px-10 border border-transparent rounded-full text-lg font-bold text-indigo-600 shadow-lg hover:bg-indigo-50 hover:scale-105 transition-all duration-300">
                    Lihat Rumah Tersedia
                </a>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="bg-white py-8 shadow-2xl rounded-3xl mt-[-48px] relative z-10 animate-fadeInUp">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Cari Rumah</h2>
                <form action="{{ route('houses.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-map-marker-alt"></i></span>
                            <select name="location" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Semua Lokasi</option>
                                <option value="Jakarta Selatan">Jakarta Selatan</option>
                                <option value="Jakarta Pusat">Jakarta Pusat</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Jakarta Timur">Jakarta Timur</option>
                                <option value="Jakarta Utara">Jakarta Utara</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Rumah</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-home"></i></span>
                            <select name="type" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Semua Tipe</option>
                                <option value="rumah_1_lantai">Rumah 1 Lantai</option>
                                <option value="rumah_2_lantai">Rumah 2 Lantai</option>
                                <option value="villa">Villa</option>
                                <option value="apartemen">Apartemen</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-gray-400"><i class="fas fa-money-bill-wave"></i></span>
                            <select name="price_range" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Semua Harga</option>
                                <option value="under_500m">< 500 Juta</option>
                                <option value="500m_1b">500 Juta - 1 Miliar</option>
                                <option value="1b_2b">1 Miliar - 2 Miliar</option>
                                <option value="over_2b">> 2 Miliar</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-2 px-4 rounded-lg hover:from-indigo-700 hover:to-blue-700 shadow-lg hover:scale-105 transition duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Fitur Unggulan -->
    <div class="bg-white py-16">
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
                <!-- Fitur 1 -->
                <div class="text-center bg-indigo-50 rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Booking Aman</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Transaksi aman dengan berbagai metode pembayaran terpercaya
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="text-center bg-indigo-50 rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Lokasi Strategis</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Pilihan rumah dengan lokasi strategis dan akses mudah
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="text-center bg-indigo-50 rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Layanan 24/7</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Customer service siap membantu Anda kapan saja
                    </p>
                </div>

                <!-- Fitur 4 -->
                <div class="text-center bg-indigo-50 rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mx-auto mb-4">
                        <i class="fas fa-certificate text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Terverifikasi</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Semua properti telah diverifikasi dan terjamin kualitasnya
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Rumah Tersedia -->
    <div class="bg-gray-50 py-16">
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
                @forelse($houses as $house)
                <div class="group relative bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl hover:scale-105 transition-all duration-500 border border-gray-100 hover:border-indigo-400">
                    <div class="w-full h-64 bg-gray-200 overflow-hidden">
                        @if($house->main_image)
                            <img src="{{ Storage::url($house->main_image) }}" 
                                 alt="{{ $house->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500 rounded-2xl">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-300">
                                <i class="fas fa-home text-4xl text-gray-500"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $house->name }}</h3>
                            <span class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                {{ $house->status_text }}
                            </span>
                        </div>
                        <p class="text-gray-600 mb-2 flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>{{ $house->city }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4 gap-4">
                            <span class="flex items-center"><i class="fas fa-bed mr-1"></i>{{ $house->bedrooms }} Kamar</span>
                            <span class="flex items-center"><i class="fas fa-bath mr-1"></i>{{ $house->bathrooms }} Kamar Mandi</span>
                            <span class="flex items-center"><i class="fas fa-ruler-combined mr-1"></i>{{ $house->area }} m²</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-2xl font-bold text-blue-600">{{ $house->formatted_price }}</p>
                            <a href="{{ route('houses.show', $house->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow hover:bg-indigo-700 hover:scale-105 transition-all duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75V19a2 2 0 002 2h14a2 2 0 002-2V9.75M9.75 21V13.5a2.25 2.25 0 114.5 0V21M12 3v4.5m0 0L7.5 9m4.5-1.5l4.5 1.5" /></svg>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Belum ada rumah tersedia</h3>
                    <p class="text-gray-500">Silakan cek kembali nanti untuk melihat rumah yang tersedia.</p>
                </div>
                @endforelse
            </div>
            @if($houses->count() > 0)
            <div class="text-center mt-12">
                <a href="{{ route('houses.index') }}" class="inline-block bg-indigo-600 text-white px-10 py-4 rounded-full text-lg font-bold shadow hover:bg-indigo-700 hover:scale-105 transition-all duration-300">
                    Lihat Semua Rumah
                </a>
            </div>
            @endif
        </div>
    </div>

    <!-- Section Testimoni -->
    <div class="bg-white py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Apa Kata Mereka?</h2>
            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <div class="bg-indigo-50 p-8 rounded-2xl shadow-lg flex-1 flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 10a4 4 0 10-8 0 4 4 0 008 0zm6 8v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a6 6 0 0112 0v2a2 2 0 002-2v-2a6 6 0 0112 0z" /></svg>
                    <p class="text-lg italic mb-4">"Proses booking sangat mudah dan cepat. Rumahnya sesuai ekspektasi!"</p>
                    <div class="font-bold">- Andi, Jakarta</div>
                </div>
                <div class="bg-indigo-50 p-8 rounded-2xl shadow-lg flex-1 flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 10a4 4 0 10-8 0 4 4 0 008 0zm6 8v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a6 6 0 0112 0v2a2 2 0 002-2v-2a6 6 0 0112 0z" /></svg>
                    <p class="text-lg italic mb-4">"Customer service sangat membantu, recommended banget!"</p>
                    <div class="font-bold">- Siti, Depok</div>
                </div>
            </div>
        </div>
    </div>
@endsection 