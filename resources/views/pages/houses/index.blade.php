@extends('layouts.main')

@section('title', 'Daftar Rumah - FindUrHouse')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">
                    Daftar Rumah Tersedia
                </h1>
                <p class="mt-4 text-xl text-indigo-100 max-w-3xl mx-auto">
                    Temukan rumah impian Anda dengan berbagai pilihan lokasi, tipe, dan harga yang sesuai kebutuhan
                </p>
            </div>
        </div>
    </div>

    <!-- Search & Filter Section -->
    <div class="bg-white py-8 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Cari & Filter Rumah</h2>
                
                <form action="{{ route('houses.index') }}" method="GET" class="space-y-6">
                    <!-- Search Bar -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cari Rumah</label>
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Masukkan nama rumah, lokasi, atau deskripsi..." 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 flex items-center">
                                <i class="fas fa-search mr-2"></i>Cari
                            </button>
                            <a href="{{ route('houses.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300 flex items-center">
                                <i class="fas fa-refresh mr-2"></i>Reset
                            </a>
                        </div>
                    </div>

                    <!-- Filter Options -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                            <select name="location" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Semua Lokasi</option>
                                <option value="Jakarta Selatan" {{ request('location') == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                                <option value="Jakarta Pusat" {{ request('location') == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                                <option value="Jakarta Barat" {{ request('location') == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                                <option value="Jakarta Timur" {{ request('location') == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                                <option value="Jakarta Utara" {{ request('location') == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Rumah</label>
                            <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Semua Tipe</option>
                                <option value="rumah_1_lantai" {{ request('type') == 'rumah_1_lantai' ? 'selected' : '' }}>Rumah 1 Lantai</option>
                                <option value="rumah_2_lantai" {{ request('type') == 'rumah_2_lantai' ? 'selected' : '' }}>Rumah 2 Lantai</option>
                                <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                                <option value="apartemen" {{ request('type') == 'apartemen' ? 'selected' : '' }}>Apartemen</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                            <select name="price_range" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Semua Harga</option>
                                <option value="under_500m" {{ request('price_range') == 'under_500m' ? 'selected' : '' }}>< 500 Juta</option>
                                <option value="500m_1b" {{ request('price_range') == '500m_1b' ? 'selected' : '' }}>500 Juta - 1 Miliar</option>
                                <option value="1b_2b" {{ request('price_range') == '1b_2b' ? 'selected' : '' }}>1 Miliar - 2 Miliar</option>
                                <option value="over_2b" {{ request('price_range') == 'over_2b' ? 'selected' : '' }}>> 2 Miliar</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Semua Status</option>
                                <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Sudah Dipesan</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Results Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Results Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Hasil Pencarian
                    </h2>
                    <p class="text-gray-600 mt-1">
                        Ditemukan {{ $houses->total() }} rumah yang sesuai dengan kriteria Anda
                    </p>
                </div>
                
                <!-- Sort Options -->
                <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                    <label class="text-sm font-medium text-gray-700">Urutkan:</label>
                    <select onchange="window.location.href=this.value" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name']) }}" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                    </select>
                </div>
            </div>

            <!-- Houses Grid -->
            @if($houses->count() > 0)
                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach($houses as $house)
                    <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Image Section -->
                        <div class="w-full h-64 bg-gray-200 overflow-hidden relative">
                            @if($house->main_image)
                                <img src="{{ Storage::url($house->main_image) }}" 
                                     alt="{{ $house->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-300 to-gray-400">
                                    <i class="fas fa-home text-6xl text-gray-500"></i>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                @if($house->status == 'available')
                                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                        Sudah Dipesan
                                    </span>
                                @endif
                            </div>

                            <!-- Quick View Button -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                <a href="{{ route('houses.show', $house->id) }}" 
                                   class="bg-white text-gray-900 px-6 py-3 rounded-lg font-medium opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-4 group-hover:translate-y-0">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-6">
                            <!-- Title and Location -->
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition duration-300">
                                    {{ $house->name }}
                                </h3>
                                <p class="text-gray-600 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>
                                    {{ $house->city }}
                                </p>
                            </div>

                            <!-- House Features -->
                            <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                                <span class="flex items-center">
                                    <i class="fas fa-bed mr-1 text-indigo-500"></i>
                                    {{ $house->bedrooms }} Kamar
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-bath mr-1 text-indigo-500"></i>
                                    {{ $house->bathrooms }} Kamar Mandi
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-ruler-combined mr-1 text-indigo-500"></i>
                                    {{ $house->area }} m²
                                </span>
                            </div>

                            <!-- Price and Action -->
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-2xl font-bold text-indigo-600">{{ $house->formatted_price }}</p>
                                    <p class="text-sm text-gray-500">Bisa Nego</p>
                                </div>
                                <a href="{{ route('houses.show', $house->id) }}" 
                                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition duration-300 flex items-center">
                                    <i class="fas fa-eye mr-2"></i>Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($houses->hasPages())
                <div class="mt-12">
                    {{ $houses->appends(request()->query())->links() }}
                </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada rumah ditemukan</h3>
                        <p class="text-gray-500 mb-6">
                            Maaf, tidak ada rumah yang sesuai dengan kriteria pencarian Anda. 
                            Coba ubah filter atau kata kunci pencarian.
                        </p>
                        <a href="{{ route('houses.index') }}" 
                           class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300">
                            Reset Pencarian
                        </a>
                    </div>
                </div>
            @endif
            
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-indigo-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Butuh Bantuan Mencari Rumah?
            </h2>
            <p class="text-indigo-100 mb-8 max-w-2xl mx-auto">
                Tim kami siap membantu Anda menemukan rumah yang tepat sesuai dengan kebutuhan dan budget Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+6281234567890" 
                   class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300 flex items-center justify-center">
                    <i class="fas fa-phone mr-2"></i>Hubungi Kami
                </a>
                <a href="mailto:info@rumahsejahtera.com" 
                   class="border-2 border-white text-white px-8 py-3 rounded-lg font-medium hover:bg-white hover:text-indigo-600 transition duration-300 flex items-center justify-center">
                    <i class="fas fa-envelope mr-2"></i>Kirim Email
                </a>
            </div>
        </div>
    </div>
@endsection 