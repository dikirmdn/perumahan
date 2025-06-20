<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-blue-100 p-6 rounded-lg text-center shadow">
                            <div class="text-3xl font-bold text-blue-700 mb-2">{{ $totalRumah }}</div>
                            <div class="text-gray-700 font-semibold">Total Rumah</div>
                        </div>
                        <div class="bg-green-100 p-6 rounded-lg text-center shadow">
                            <div class="text-3xl font-bold text-green-700 mb-2">{{ $totalRuko }}</div>
                            <div class="text-gray-700 font-semibold">Total Ruko</div>
                        </div>
                        <div class="bg-purple-100 p-6 rounded-lg text-center shadow">
                            <div class="text-3xl font-bold text-purple-700 mb-2">{{ $totalBooking }}</div>
                            <div class="text-gray-700 font-semibold">Total Booking</div>
                        </div>
                    </div>
          
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
