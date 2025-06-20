<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Rumah') }}
            </h2>
            <a href="{{ route('admin.houses.create') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Rumah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">No</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Kota</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Harga</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tipe</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Gambar</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($houses as $key => $house)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $key + 1 }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $house->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $house->city }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $house->formatted_price }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $house->type_text }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                                {{ $house->status === 'available' ? 'bg-green-100 text-green-800' : 
                                                   ($house->status === 'booked' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ $house->status_text }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            @if($house->images && count($house->images) > 0)
                                                <img src="{{ Storage::url($house->images[0]) }}" 
                                                     class="w-16 h-16 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity duration-200" 
                                                     data-bs-toggle="modal" 
                                                     data-bs-target="#imageModal{{ $house->id }}"
                                                     alt="{{ $house->name }}">
                                            @else
                                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.houses.edit', $house->id) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form id="deleteForm{{ $house->id }}" action="{{ route('admin.houses.destroy', $house->id) }}" method="POST" class="inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus rumah ini?')">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{$houses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview Gambar -->
    @foreach ($houses as $house)
    @if($house->images && count($house->images) > 0)
    <div class="modal fade" id="imageModal{{ $house->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $house->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-white rounded-lg shadow-xl">
                <div class="modal-header border-b border-gray-200 p-4">
                    <h5 class="text-lg font-semibold text-gray-900" id="imageModalLabel{{ $house->id }}">
                        Preview Gambar - {{ $house->name }}
                    </h5>
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" data-bs-dismiss="modal" aria-label="Close">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="flex justify-center">
                        <img src="{{ Storage::url($house->images[0]) }}" 
                             class="max-h-[70vh] object-contain rounded-lg" 
                             alt="{{ $house->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</x-app-layout>

