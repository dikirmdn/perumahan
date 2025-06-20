@extends('layouts.main')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Booking Rumah: {{ $house->name }}</h2>
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">{{ session('error') }}</div>
        @endif
        <form action="{{ route('bookings.store', $house->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Rumah</label>
                <input type="text" value="{{ $house->name }}" class="w-full border rounded px-3 py-2" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat</label>
                <input type="text" value="{{ $house->address }}" class="w-full border rounded px-3 py-2" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nomor HP</label>
                <input type="tel" name="phone_number" class="w-full border rounded px-3 py-2" required placeholder="Masukkan nomor HP Anda">
                @error('phone_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Booking Sekarang</button>
        </form>
    </div>
</div>
@endsection 