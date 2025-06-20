<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Http\Requests\admin\HouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::query();

        // Default filter untuk tipe Rumah
        $query->where('type', 'Rumah');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('city', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan lokasi
        if ($request->filled('location')) {
            $query->where('city', 'like', '%' . $request->location . '%');
        }

        // Filter berdasarkan tipe rumah
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan harga
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under_500m':
                    $query->where('price', '<', 500000000);
                    break;
                case '500m_1b':
                    $query->whereBetween('price', [500000000, 1000000000]);
                    break;
                case '1b_2b':
                    $query->whereBetween('price', [1000000000, 2000000000]);
                    break;
                case 'over_2b':
                    $query->where('price', '>', 2000000000);
                    break;
            }
        }

        // Filter berdasarkan status - untuk user biasa hanya tampilkan yang tersedia
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sorting
        switch ($request->get('sort', 'latest')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $houses = $query->paginate(12);

        return view('pages.houses.index', compact('houses'));
    }

    public function adminIndex(Request $request)
    {
        $query = House::query();

        // Search functionality untuk admin
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('city', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan lokasi
        if ($request->filled('location')) {
            $query->where('city', 'like', '%' . $request->location . '%');
        }

        // Filter berdasarkan tipe rumah
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan harga
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under_500m':
                    $query->where('price', '<', 500000000);
                    break;
                case '500m_1b':
                    $query->whereBetween('price', [500000000, 1000000000]);
                    break;
                case '1b_2b':
                    $query->whereBetween('price', [1000000000, 2000000000]);
                    break;
                case 'over_2b':
                    $query->where('price', '>', 2000000000);
                    break;
            }
        }

        // Filter berdasarkan status - admin bisa lihat semua status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sorting
        switch ($request->get('sort', 'latest')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $houses = $query->paginate(12);

        return view('pages.admin.houses.index', compact('houses'));
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        $relatedHouses = House::where('city', $house->city)
            ->where('id', '!=', $house->id)
            ->where('status', 'available')
            ->take(3)
            ->get();

        return view('pages.houses.show', compact('house', 'relatedHouses'));
    }

    public function create()
    {
        return view('pages.admin.houses.create');
    }

    public function store(Request $request)
    {
        // Debug: Log data yang diterima dengan fokus ke field type
        Log::info('Type from request:', ['type' => $request->type]);

        // Validasi manual untuk sementara
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:rumah,ruko',
            'price' => 'required|numeric',
            'status' => 'required|in:tersedia,dalam_booking,tidak_tersedia',
            'address' => 'required|string',
            'city' => 'required|string',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'description' => 'required|string',
            'amenities' => 'nullable|array',
            'amenities.*' => 'string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Debug: Log type setelah validasi
        Log::info('Type after validation:', ['type' => $validated['type']]);

        try {
            // Siapkan data untuk disimpan
            $data = [
                'name' => $validated['name'],
                'type' => ucfirst(strtolower($validated['type'])), // Pastikan huruf pertama kapital
                'price' => $validated['price'],
                'status' => match($validated['status']) {
                    'tersedia' => 'available',
                    'tidak_tersedia' => 'unavailable',
                    'dalam_booking' => 'booked',
                    default => 'available'
                },
                'address' => $validated['address'],
                'city' => $validated['city'],
                'area' => $validated['area'],
                'bedrooms' => $validated['bedrooms'],
                'bathrooms' => $validated['bathrooms'],
                'description' => $validated['description'],
                'amenities' => $request->amenities ?? [],
                'features' => $request->features ?? [],
                'owner_id' => Auth::id(),
                'slug' => Str::slug($validated['name']),
                'images' => []
            ];

            // Debug: Log type sebelum create
            Log::info('Type before create:', ['type' => $data['type']]);

            // Handle image uploads
            if ($request->hasFile('images')) {
                $uploadedImages = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('houses', 'public');
                    $uploadedImages[] = $path;
                }
                $data['images'] = $uploadedImages;
            }

            // Buat record baru
            $house = House::create($data);

            // Debug: Log type setelah create
            Log::info('Type after create:', ['type' => $house->type]);
            Log::info('Type text after create:', ['type_text' => $house->type_text]);

            return redirect()
                ->route('admin.houses.index')
                ->with('success', 'Rumah berhasil ditambahkan');

        } catch (\Exception $e) {
            Log::error('Error creating house:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data rumah. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        return view('pages.admin.houses.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
        $house = House::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'area' => 'required|numeric|min:0',
            'type' => 'required|in:rumah,ruko',
            'status' => 'required|in:tersedia,tidak_tersedia,dalam_booking',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'array',
            'features' => 'array',
        ]);

        try {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            
            // Konversi status ke format yang sesuai dengan database
            $data['status'] = match($request->status) {
                'tersedia' => 'available',
                'tidak_tersedia' => 'unavailable',
                'dalam_booking' => 'booked',
                default => 'available'
            };

            // Handle image uploads
            if ($request->hasFile('images')) {
                $images = $house->images ?? [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('houses', 'public');
                    $images[] = $path;
                }
                $data['images'] = $images;
            }

            $house->update($data);

            return redirect()
                ->route('admin.houses.index')
                ->with('success', 'Rumah berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui data rumah. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->delete();

        return redirect()->route('admin.houses.index')->with('success', 'Rumah berhasil dihapus');
    }
} 