@extends('layouts.main')

@section('title', 'Booking Saya - FindUrHouse')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 py-12 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">
                    Booking Saya
                </h1>
                <p class="mt-4 text-xl text-indigo-100 max-w-3xl mx-auto">
                    Lihat dan kelola semua booking rumah Anda di sini
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">{{ session('error') }}</div>
            @endif
            @if($bookings->isEmpty())
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-times text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Anda belum memiliki booking</h3>
                    <p class="text-gray-500 mb-6">
                        Silakan lakukan booking rumah terlebih dahulu.
                    </p>
                    <a href="{{ route('houses.index') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300">
                        Lihat Daftar Rumah
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border rounded-xl shadow-md">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Rumah</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Tanggal Booking</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="py-3 px-4 border-b text-left text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-3 px-4 border-b">{{ $booking->house->name ?? 'Data tidak tersedia' }}</td>
                                <td class="py-3 px-4 border-b">{{ $booking->booking_date->format('d-m-Y') }}</td>
                                <td class="py-3 px-4 border-b">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                                        {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 border-b">
                                    <a href="{{ route('bookings.show', $booking->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition duration-300 mr-2">
                                        Detail
                                    </a>
                                    @if($booking->status !== 'confirmed')
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-600 transition duration-300" onclick="return confirm('Batalkan booking ini?')">
                                            Batalkan
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination jika ada --}}
                @if(method_exists($bookings, 'links'))
                <div class="mt-8">
                    {{ $bookings->appends(request()->query())->links() }}
                </div>
                @endif
            @endif
        </div>
    </div>
@endsection 