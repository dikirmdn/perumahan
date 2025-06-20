@extends('layouts.main')

@section('title', $house->name . ' - CitraGarden')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('houses.index') }}" class="text-gray-500 hover:text-gray-700">Daftar Rumah</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-900">{{ $house->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- House Detail Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image Gallery -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="relative">
                        @if($house->images && count($house->images) > 0)
                            <div class="relative h-96">
                                <img src="{{ Storage::url($house->images[0]) }}" 
                                     alt="{{ $house->name }}" 
                                     class="w-full h-full object-cover">
                                @if(count($house->images) > 1)
                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                    @foreach($house->images as $index => $image)
                                    <button class="w-3 h-3 rounded-full bg-white bg-opacity-75 hover:bg-opacity-100 transition duration-300"
                                            onclick="showImage({{ $index }})"></button>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @if(count($house->images) > 1)
                            <div class="p-4 bg-gray-50">
                                <div class="flex space-x-2 overflow-x-auto">
                                    @foreach($house->images as $index => $image)
                                    <img src="{{ Storage::url($image) }}" 
                                         alt="{{ $house->name }} - Image {{ $index + 1 }}" 
                                         class="w-20 h-16 object-cover rounded cursor-pointer hover:opacity-75 transition duration-300"
                                         onclick="showImage({{ $index }})">
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        @else
                            <div class="h-96 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                <i class="fas fa-home text-8xl text-gray-500"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- House Information -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $house->name }}</h1>
                            <p class="text-gray-600 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>
                                {{ $house->address }}, {{ $house->city }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-indigo-600">{{ $house->formatted_price }}</p>
                            <p class="text-gray-500">Bisa Nego</p>
                            <span class="inline-block mt-2 px-3 py-1 text-sm font-medium rounded-full 
                                {{ $house->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $house->status == 'available' ? 'Tersedia' : 'Sudah Dipesan' }}
                            </span>
                        </div>
                    </div>
                    <!-- House Features -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-bed text-2xl text-indigo-500 mb-2"></i>
                            <p class="font-semibold text-gray-900">{{ $house->bedrooms }}</p>
                            <p class="text-sm text-gray-500">Kamar Tidur</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-bath text-2xl text-indigo-500 mb-2"></i>
                            <p class="font-semibold text-gray-900">{{ $house->bathrooms }}</p>
                            <p class="text-sm text-gray-500">Kamar Mandi</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-ruler-combined text-2xl text-indigo-500 mb-2"></i>
                            <p class="font-semibold text-gray-900">{{ $house->area }} m²</p>
                            <p class="text-sm text-gray-500">Luas Area</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-home text-2xl text-indigo-500 mb-2"></i>
                            <p class="font-semibold text-gray-900">{{ $house->type_text }}</p>
                            <p class="text-sm text-gray-500">Tipe Rumah</p>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $house->description }}</p>
                    </div>
                    <!-- Amenities -->
                    @if($house->amenities && count($house->amenities) > 0)
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Fasilitas</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($house->amenities as $amenity)
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                <span>{{ $amenity }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- Features -->
                    @if($house->features && count($house->features) > 0)
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Fitur Unggulan</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($house->features as $feature)
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-star text-yellow-500 mr-2"></i>
                                <span>{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <!-- Location (optional, bisa diaktifkan jika ingin sama persis) -->
                @if($house->latitude && $house->longitude)
                {{-- <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Lokasi</h3>
                    <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">Peta lokasi akan ditampilkan di sini</p>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{ $house->address }}, {{ $house->city }}
                    </p>
                </div> --}}
                @endif
            </div>
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Booking Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6 sticky top-24">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Booking Rumah Ini</h3>
                    <div class="mb-6">
                        <p class="text-3xl font-bold text-indigo-600 mb-2">{{ $house->formatted_price }}</p>
                        <p class="text-gray-500">per bulan</p>
                    </div>
                    @if($house->status == 'available')
                        @auth
                            <a href="{{ route('bookings.create', $house->id) }}" 
                               class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-indigo-700 transition duration-300 flex items-center justify-center mb-4">
                                <i class="fas fa-calendar-check mr-2"></i>Booking Sekarang
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-indigo-700 transition duration-300 flex items-center justify-center mb-4">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Booking
                            </a>
                        @endauth
                    @else
                        <button disabled class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-medium cursor-not-allowed mb-4">
                            <i class="fas fa-times mr-2"></i>Tidak Tersedia
                        </button>
                    @endif
                    <div class="flex space-x-2">
                        <a href="https://wa.me/62895349132500?text=Halo, saya tertarik dengan {{ $house->name }}" 
                           target="_blank"
                           class="flex-1 bg-green-500 text-white text-center px-4 py-2 rounded-lg font-medium hover:bg-green-600 transition duration-300 flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i>
                            WhatsApp
                        </a>
                        <a href="tel:+62895349132500" 
                           class="flex-1 bg-blue-500 text-white text-center px-4 py-2 rounded-lg font-medium hover:bg-blue-600 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-phone mr-2"></i>
                            Telepon
                        </a>
                    </div>
                </div>
                <!-- Agent/Owner Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Agen</h3>
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-3xl text-indigo-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Agen CitraGarden</p>
                            <p class="text-gray-500 text-sm">Professional Property Agent</p>
                            <p class="text-indigo-600 font-medium mt-1">
                                <i class="fas fa-star text-yellow-400"></i>
                                4.9/5 (120 reviews)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Image Gallery Modal pakai Alpine.js -->
    <div x-data="{ isOpen: false, currentImage: 0 }" 
         x-show="isOpen" 
         x-on:keydown.escape.window="isOpen = false"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
         style="display: none;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <button @click="isOpen = false" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="relative">
                @if($house->images && count($house->images) > 0)
                    <template x-for="(image, index) in {{ json_encode($house->images) }}" :key="index">
                        <div x-show="currentImage === index" class="flex items-center justify-center">
                            <img :src="'{{ Storage::url('') }}' + image" 
                                 :alt="'{{ $house->name }} - Image ' + (index + 1)"
                                 class="max-h-[80vh] w-auto">
                        </div>
                    </template>
                @endif
                @if($house->images && count($house->images) > 1)
                    <button @click="currentImage = (currentImage - 1 + {{ count($house->images) }}) % {{ count($house->images) }}"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button @click="currentImage = (currentImage + 1) % {{ count($house->images) }}"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function showImage(index) {
            window.dispatchEvent(new CustomEvent('show-gallery', { detail: { index } }));
        }
    </script>
    @endpush
@endsection 