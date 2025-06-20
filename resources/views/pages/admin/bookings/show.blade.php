<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Ubah Status Booking') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <div class="mb-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-500 text-xs uppercase mb-1">User</div>
                                <div class="text-gray-900 font-semibold">{{ $booking->user->name ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-xs uppercase mb-1">Rumah</div>
                                <div class="text-gray-900 font-semibold">{{ $booking->house->name ?? '-' }}</div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-xs uppercase mb-1">Tanggal Booking</div>
                                <div class="text-gray-900 font-semibold">{{ $booking->booking_date }}</div>
                            </div>
                            <div>
                                <div class="text-gray-500 text-xs uppercase mb-1">Status Saat Ini</div>
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                       ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            <div>
                                <div class="text-gray-500 text-xs uppercase mb-1">Status Pembayaran</div>
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                    {{ $booking->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                       ($booking->payment_status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($booking->payment_status === 'refunded' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800')) }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Booking</label>
                            <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div>
                            <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Status Pembayaran</label>
                            <select name="payment_status" id="payment_status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="unpaid" {{ $booking->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="refunded" {{ $booking->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">Simpan Perubahan</button>
                            <a href="{{ route('admin.bookings.index') }}" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-colors duration-200">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 