<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRumah = House::where('type', 'rumah')->count();
        $totalRuko = House::where('type', 'ruko')->count();
        $totalBooking = Booking::count();

        return view('dashboard', compact('totalRumah', 'totalRuko', 'totalBooking'));
    }
} 