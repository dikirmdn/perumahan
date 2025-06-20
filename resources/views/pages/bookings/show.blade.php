@extends('layouts.main')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Detail Booking</h2>
        
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">{{ session('error') }}</div>
        @endif

        <div class="mb-4">
            <label class="block text-gray-700">Nama Rumah</label>
            <div class="border rounded px-3 py-2">{{ $booking->house->name ?? 'Data tidak tersedia' }}</div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Alamat</label>
            <div class="border rounded px-3 py-2">{{ $booking->house->address ?? 'Data tidak tersedia' }}</div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Nomor HP</label>
            <div class="border rounded px-3 py-2">{{ $booking->phone_number }}</div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Booking</label>
            <div class="border rounded px-3 py-2">{{ $booking->booking_date->format('d-m-Y') }}</div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <div class="border rounded px-3 py-2">{{ ucfirst($booking->status) }}</div>
        </div>
        @if($booking->status === 'pending')
        <div class="mb-4">
            <div class="bg-yellow-100 text-yellow-700 p-2 rounded">Silakan lakukan pembayaran untuk mengkonfirmasi booking Anda.</div>
        </div>
        @endif
        <a href="{{ route('bookings.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke daftar booking</a>
    </div>
</div>
@endsection 