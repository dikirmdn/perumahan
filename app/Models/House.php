<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class House extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'type', 
        'status', // tersedia, tidak_tersedia, dalam_booking
        'images',
        'amenities',
        'features',
        'owner_id',
        'slug'
    ];

    protected $casts = [
        'images' => 'array',
        'amenities' => 'array',
        'features' => 'array',
        'price' => 'decimal:2',
        'area' => 'decimal:2',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'available' => 'Tersedia',
            'tersedia' => 'Tersedia',
            'booked' => 'Sudah Dipesan',
            'dalam_booking' => 'Sudah Dipesan',
            'unavailable' => 'Tidak Tersedia',
            'tidak_tersedia' => 'Tidak Tersedia',
            default => 'Unknown'
        };
    }

    public function getTypeTextAttribute()
    {
        // Debug: Log nilai type sebelum diproses
        Log::info('Type value in accessor:', ['type' => $this->type]);
        
        return match($this->type) {
            'Rumah', 'rumah' => 'Rumah',
            'Ruko', 'ruko' => 'Ruko',
            default => 'Unknown'
        };
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getMainImageAttribute()
    {
        return $this->images[0] ?? null;
    }
} 