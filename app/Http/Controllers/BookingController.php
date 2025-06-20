<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\House;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with(['house', 'user'])
            ->latest()
            ->paginate(10);

        return view('pages.bookings.index', compact('bookings'));
    }

    public function create($houseId)
    {
        $house = House::findOrFail($houseId);
        
        if ($house->status !== 'available') {
            return redirect()->back()->with('error', 'Rumah ini tidak tersedia untuk booking');
        }

        return view('pages.bookings.create', compact('house'));
    }

    public function store(Request $request, $houseId)
    {
        $house = House::findOrFail($houseId);
        
        if ($house->status !== 'available') {
            return redirect()->back()->with('error', 'Rumah ini tidak tersedia untuk booking');
        }

        // Validasi nomor HP
        $request->validate([
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15'
        ], [
            'phone_number.required' => 'Nomor HP wajib diisi',
            'phone_number.regex' => 'Format nomor HP tidak valid',
            'phone_number.min' => 'Nomor HP minimal 10 digit',
            'phone_number.max' => 'Nomor HP maksimal 15 digit'
        ]);

        $totalPrice = $house->price;

        // Cek apakah sudah ada booking aktif untuk rumah ini
        $conflictingBooking = Booking::where('house_id', $houseId)
            ->where('status', '!=', 'cancelled')
            ->first();
        if ($conflictingBooking) {
            return redirect()->back()->with('error', 'Rumah ini sudah dibooking oleh user lain');
        }

        $booking = Booking::create([
            'house_id' => $houseId,
            'user_id' => auth()->id(),
            'phone_number' => $request->phone_number,
            'booking_date' => now(),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Update status rumah menjadi booked
        $house->update(['status' => 'booked']);

        return redirect()->route('bookings.show', $booking->id)
            ->with('success', 'Booking berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function show($id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->with(['house', 'user'])
            ->findOrFail($id);

        if (!$booking->house) {
            return redirect()->route('bookings.index')
                ->with('error', 'Data rumah tidak ditemukan.');
        }

        return view('pages.bookings.show', compact('booking'));
    }

    public function cancel($id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->findOrFail($id);

        if ($booking->status === 'confirmed') {
            return redirect()->back()->with('error', 'Booking yang sudah dikonfirmasi tidak dapat dibatalkan');
        }

        $booking->update(['status' => 'cancelled']);

        // Update status rumah kembali menjadi available
        $booking->house->update(['status' => 'available']);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil dibatalkan');
    }

    public function adminIndex()
    {
        $bookings = Booking::with(['house', 'user'])
            ->latest()
            ->paginate(15);

        return view('pages.admin.bookings.index', compact('bookings'));
    }

    public function adminShow($id)
    {
        $booking = Booking::with(['house', 'user'])
            ->findOrFail($id);

        return view('pages.admin.bookings.show', compact('booking'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'payment_status' => 'required|in:unpaid,paid,refunded'
        ]);

        $oldStatus = $booking->status;
        $booking->update($request->only(['status', 'payment_status']));

        // Update status rumah berdasarkan status booking
        if ($booking->status === 'cancelled' && $oldStatus !== 'cancelled') {
            $booking->house->update(['status' => 'available']);
        } elseif ($booking->status === 'confirmed' && $oldStatus === 'pending') {
            $booking->house->update(['status' => 'booked']);
        }

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Status booking berhasil diperbarui');
    }

    public function downloadCompletedPDF()
    {
        $completedBookings = Booking::where('status', 'completed')
            ->with(['house', 'user'])
            ->latest()
            ->get();

        $pdf = PDF::loadView('pages.bookings.completed-pdf', [
            'bookings' => $completedBookings
        ]);

        return $pdf->download('completed-bookings.pdf');
    }
} 