<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'house_id',
        'user_id',
        'phone_number',
        'booking_date',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status', // pending, confirmed, cancelled, completed
        'payment_status', // unpaid, paid, refunded
        'payment_method',
        'notes',
        'guest_count',
        'special_requests'
    ];

    protected $casts = [
        'booking_date' => 'datetime',
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'total_price' => 'decimal:2',
        'special_requests' => 'array'
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu Konfirmasi',
            'confirmed' => 'Dikonfirmasi',
            'cancelled' => 'Dibatalkan',
            'completed' => 'Selesai',
            default => 'Unknown'
        };
    }

    public function getPaymentStatusTextAttribute()
    {
        return match($this->payment_status) {
            'unpaid' => 'Belum Dibayar',
            'paid' => 'Sudah Dibayar',
            'refunded' => 'Dikembalikan',
            default => 'Unknown'
        };
    }

    public function getFormattedTotalPriceAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    public function getDurationAttribute()
    {
        return $this->check_in_date->diffInDays($this->check_out_date);
    }
} 