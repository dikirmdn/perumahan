<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // Debug: Cek semua rumah di database
        $allHouses = House::all();
        \Log::info('Total houses in database: ' . $allHouses->count());
        
        foreach ($allHouses as $house) {
            \Log::info('House: ' . $house->name . ' - Status: ' . $house->status . ' - ID: ' . $house->id);
        }

        // Debug: Cek rumah dengan status available
        $availableHouses = House::where('status', 'available')->get();
        \Log::info('Houses with status "available": ' . $availableHouses->count());
        
        foreach ($availableHouses as $house) {
            \Log::info('Available House: ' . $house->name . ' - Status: ' . $house->status);
        }

        // Query asli - menggunakan status 'available'
        $houses = House::latest()->take(3)->get();

        // Debug: Log jumlah rumah yang ditemukan
        \Log::info('Houses found in home: ' . $houses->count());
        
        // Debug: Log detail rumah yang ditemukan
        foreach ($houses as $house) {
            \Log::info('House: ' . $house->name . ' - Status: ' . $house->status);
        }

        return view('pages.home', compact('houses'));
    }
} 