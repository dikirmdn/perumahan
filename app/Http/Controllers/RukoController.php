<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class RukoController extends Controller
{
    public function index(Request $request)
    {
        $query = House::where('type', 'ruko');

        // Filter berdasarkan pencarian
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan lokasi
        if ($request->location) {
            $query->where('city', $request->location);
        }

        // Filter berdasarkan tipe ruko
        if ($request->type) {
            $query->where('subtype', $request->type);
        }

        // Filter berdasarkan rentang harga
        if ($request->price_range) {
            switch ($request->price_range) {
                case 'under_1b':
                    $query->where('price', '<', 1000000000);
                    break;
                case '1b_3b':
                    $query->whereBetween('price', [1000000000, 3000000000]);
                    break;
                case '3b_5b':
                    $query->whereBetween('price', [3000000000, 5000000000]);
                    break;
                case 'over_5b':
                    $query->where('price', '>', 5000000000);
                    break;
            }
        }

        // Filter berdasarkan status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Pengurutan
        switch ($request->sort) {
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

        $ruko = $query->paginate(9)->withQueryString();

        return view('pages.ruko.index', compact('ruko'));
    }

    public function show($id)
    {
        $ruko = House::where('type', 'ruko')->findOrFail($id);
        return view('pages.ruko.show', compact('ruko'));
    }
} 