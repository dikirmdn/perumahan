<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg">
                <!-- Header Section -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-900">Edit Rumah</h2>
                    <p class="mt-1 text-sm text-gray-600">Ubah informasi rumah sesuai kebutuhan</p>
                </div>

                <form method="post" action="{{ route('admin.houses.update', $house->id) }}" class="p-6" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Error Messages -->
                    @if ($errors->any())
                    <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc space-y-1 pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="space-y-6">
                        <!-- Basic Information Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Rumah')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="name" name="name" type="text"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('name', $house->name)" required />
                                </div>

                                <div>
                                    <x-input-label for="type" :value="__('Tipe Rumah')" class="text-sm font-medium text-gray-700" />
                                    <select id="type" name="type"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                        <option value="">Pilih Tipe Rumah</option>
                                        <option value="rumah" {{ $house->type == 'rumah' ? 'selected' : '' }}>Rumah</option>
                                        <option value="ruko" {{ $house->type == 'ruko' ? 'selected' : '' }}>Ruko</option>
                                    </select>
                                </div>

                                <div>
                                    <x-input-label for="price" :value="__('Harga')" class="text-sm font-medium text-gray-700" />
                                    <div class="relative mt-1">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                                        <x-text-input id="price" name="price" type="number" step="0.01"
                                            class="block w-full pl-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                            :value="old('price', $house->price)" required />
                                    </div>
                                </div>

                                <div>
                                    <x-input-label for="status" :value="__('Status')" class="text-sm font-medium text-gray-700" />
                                    <select id="status" name="status"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                                        <option value="tersedia" {{ $house->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="tidak_tersedia" {{ $house->status == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia</option>
                                        <option value="dalam_booking" {{ $house->status == 'booked' ? 'selected' : '' }}>Dalam Booking</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Lokasi</h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <x-input-label for="address" :value="__('Alamat Lengkap')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="address" name="address" type="text"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('address', $house->address)" required />
                                </div>

                                <div>
                                    <x-input-label for="city" :value="__('Kota')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="city" name="city" type="text"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('city', $house->city)" required />
                                </div>

                                <div>
                                    <x-input-label for="area" :value="__('Luas (m²)')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="area" name="area" type="number" step="0.01"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('area', $house->area)" required />
                                </div>
                            </div>
                        </div>

                        <!-- Room Information Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Kamar</h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <x-input-label for="bedrooms" :value="__('Jumlah Kamar Tidur')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="bedrooms" name="bedrooms" type="number" min="0"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('bedrooms', $house->bedrooms)" required />
                                </div>

                                <div>
                                    <x-input-label for="bathrooms" :value="__('Jumlah Kamar Mandi')" class="text-sm font-medium text-gray-700" />
                                    <x-text-input id="bathrooms" name="bathrooms" type="number" min="0"
                                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :value="old('bathrooms', $house->bathrooms)" required />
                                </div>
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Deskripsi Rumah</h3>
                            <div>
                                <x-input-label for="description" :value="__('Deskripsi Lengkap')" class="text-sm font-medium text-gray-700" />
                                <textarea id="description" name="description"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="4"
                                    placeholder="Masukkan deskripsi lengkap rumah..." required>{{ old('description', $house->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Amenities Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Fasilitas (Amenities)</h3>
                            <div class="grid gap-4 md:grid-cols-3">
                                @php
                                    $amenities = $house->amenities ?? [];
                                @endphp
                                <div class="flex items-center">
                                    <input type="checkbox" id="wifi" name="amenities[]" value="wifi" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('wifi', $amenities) ? 'checked' : '' }}>
                                    <label for="wifi" class="ml-2 text-sm text-gray-700">WiFi</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="ac" name="amenities[]" value="ac" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('ac', $amenities) ? 'checked' : '' }}>
                                    <label for="ac" class="ml-2 text-sm text-gray-700">AC</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="kitchen" name="amenities[]" value="kitchen" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('kitchen', $amenities) ? 'checked' : '' }}>
                                    <label for="kitchen" class="ml-2 text-sm text-gray-700">Dapur</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="parking" name="amenities[]" value="parking" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('parking', $amenities) ? 'checked' : '' }}>
                                    <label for="parking" class="ml-2 text-sm text-gray-700">Parkir</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="tv" name="amenities[]" value="tv" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('tv', $amenities) ? 'checked' : '' }}>
                                    <label for="tv" class="ml-2 text-sm text-gray-700">TV</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="pool" name="amenities[]" value="pool" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('pool', $amenities) ? 'checked' : '' }}>
                                    <label for="pool" class="ml-2 text-sm text-gray-700">Kolam Renang</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="garden" name="amenities[]" value="garden" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('garden', $amenities) ? 'checked' : '' }}>
                                    <label for="garden" class="ml-2 text-sm text-gray-700">Taman</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="security" name="amenities[]" value="security" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('security', $amenities) ? 'checked' : '' }}>
                                    <label for="security" class="ml-2 text-sm text-gray-700">Keamanan 24 Jam</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="laundry" name="amenities[]" value="laundry" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('laundry', $amenities) ? 'checked' : '' }}>
                                    <label for="laundry" class="ml-2 text-sm text-gray-700">Laundry</label>
                                </div>
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Fitur Khusus</h3>
                            <div class="grid gap-4 md:grid-cols-3">
                                @php
                                    $features = $house->features ?? [];
                                @endphp
                                <div class="flex items-center">
                                    <input type="checkbox" id="balcony" name="features[]" value="balcony" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('balcony', $features) ? 'checked' : '' }}>
                                    <label for="balcony" class="ml-2 text-sm text-gray-700">Balkon</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="fireplace" name="features[]" value="fireplace" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('fireplace', $features) ? 'checked' : '' }}>
                                    <label for="fireplace" class="ml-2 text-sm text-gray-700">Perapian</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="gym" name="features[]" value="gym" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('gym', $features) ? 'checked' : '' }}>
                                    <label for="gym" class="ml-2 text-sm text-gray-700">Gym</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="sauna" name="features[]" value="sauna" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('sauna', $features) ? 'checked' : '' }}>
                                    <label for="sauna" class="ml-2 text-sm text-gray-700">Sauna</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="bbq" name="features[]" value="bbq" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('bbq', $features) ? 'checked' : '' }}>
                                    <label for="bbq" class="ml-2 text-sm text-gray-700">BBQ Area</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="workspace" name="features[]" value="workspace" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array('workspace', $features) ? 'checked' : '' }}>
                                    <label for="workspace" class="ml-2 text-sm text-gray-700">Workspace</label>
                                </div>
                            </div>
                        </div>

                        <!-- Photo Upload Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Foto Rumah</h3>
                            <div class="mt-2">
                                <!-- Current Images Preview -->
                                @if($house->images && count($house->images) > 0)
                                <div class="mb-6">
                                    <p class="mb-2 text-sm font-medium text-gray-700">Foto Saat Ini</p>
                                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                                        @foreach($house->images as $image)
                                        <div class="relative aspect-square overflow-hidden rounded-lg bg-gray-100">
                                            <img src="{{ Storage::url($image) }}" 
                                                class="h-full w-full object-cover" 
                                                alt="House image" />
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Upload New Images -->
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="mt-4">
                                            <label for="images" class="cursor-pointer bg-indigo-600 px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-indigo-700">
                                                Pilih Foto Baru
                                                <input type="file" id="images" name="images[]" class="sr-only" accept="image/*" multiple onchange="previewImages(event)">
                                            </label>
                                            <p class="mt-2 text-sm text-gray-600">atau drag and drop file di sini</p>
                                            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF (max. 10MB per file)</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="image-preview" class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 flex items-center justify-end space-x-3">
                        <a href="{{ route('admin.houses.index') }}" 
                           class="inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-medium text-white rounded-md hover:bg-indigo-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImages(event) {
            let previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = '';

            for (let file of event.target.files) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let div = document.createElement('div');
                    div.className = 'relative aspect-square overflow-hidden rounded-lg bg-gray-100';
                    
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'h-full w-full object-cover';
                    
                    div.appendChild(img);
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const latitude = document.getElementById('latitude');
            const longitude = document.getElementById('longitude');
            
            if (latitude && longitude) {
                // Validasi latitude
                if (latitude.value && (parseFloat(latitude.value) < -90 || parseFloat(latitude.value) > 90)) {
                    e.preventDefault();
                    alert('Latitude harus berada antara -90 dan 90 derajat');
                    latitude.focus();
                    return false;
                }
                
                // Validasi longitude
                if (longitude.value && (parseFloat(longitude.value) < -180 || parseFloat(longitude.value) > 180)) {
                    e.preventDefault();
                    alert('Longitude harus berada antara -180 dan 180 derajat');
                    longitude.focus();
                    return false;
                }
            }
        });
    </script>
</x-app-layout>
