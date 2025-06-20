<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin sebagai owner
        // $admin = User::where('is_admin', true)->first();

        // if (!$admin) {
        //     // Jika tidak ada admin, buat user baru
        //     $admin = User::create([
        //         'name' => 'Admin',
        //         'email' => 'admin@gmail.com',
        //         'password' => bcrypt('password'),
        //         'is_admin' => true,
        //         'email_verified_at' => now(),
        //     ]);
        // }

        // $houses = [
        //     [
        //         'name' => 'Rumah Modern Minimalis',
        //         'description' => 'Rumah modern dengan desain minimalis yang nyaman dan elegan. Dilengkapi dengan taman kecil dan garasi untuk 2 mobil.',
        //         'address' => 'Jl. Sudirman No. 123',
        //         'city' => 'Jakarta Selatan',
        //         'price' => 1250000000,
        //         'bedrooms' => 3,
        //         'bathrooms' => 2,
        //         'area' => 150.00,
        //         'type' => 'rumah_2_lantai',
        //         'status' => 'available',
        //         'amenities' => ['AC', 'WiFi', 'Dapur', 'Taman', 'Garasi'],
        //         'features' => ['Modern', 'Minimalis', 'Strategis'],
        //         'latitude' => -6.2088,
        //         'longitude' => 106.8456,
        //         'owner_id' => $admin->id,
        //         'slug' => 'rumah-modern-minimalis',
        //     ],
        //     [
        //         'name' => 'Villa Mewah 2 Lantai',
        //         'description' => 'Villa mewah dengan 2 lantai, kolam renang pribadi, dan pemandangan yang indah. Cocok untuk keluarga besar.',
        //         'address' => 'Jl. Thamrin No. 456',
        //         'city' => 'Jakarta Pusat',
        //         'price' => 2500000000,
        //         'bedrooms' => 4,
        //         'bathrooms' => 3,
        //         'area' => 200.00,
        //         'type' => 'villa',
        //         'status' => 'available',
        //         'amenities' => ['AC', 'WiFi', 'Kolam Renang', 'Dapur', 'Taman', 'Garasi'],
        //         'features' => ['Mewah', 'Kolam Renang', 'Pemandangan Indah'],
        //         'latitude' => -6.1751,
        //         'longitude' => 106.8650,
        //         'owner_id' => $admin->id,
        //         'slug' => 'villa-mewah-2-lantai',
        //     ],
        //     [
        //         'name' => 'Rumah Tipe 36',
        //         'description' => 'Rumah sederhana dengan tipe 36, cocok untuk keluarga kecil. Lokasi strategis dekat dengan fasilitas umum.',
        //         'address' => 'Jl. Grogol No. 789',
        //         'city' => 'Jakarta Barat',
        //         'price' => 450000000,
        //         'bedrooms' => 2,
        //         'bathrooms' => 1,
        //         'area' => 36.00,
        //         'type' => 'rumah_1_lantai',
        //         'status' => 'available',
        //         'amenities' => ['AC', 'Dapur'],
        //         'features' => ['Sederhana', 'Strategis', 'Terjangkau'],
        //         'latitude' => -6.1600,
        //         'longitude' => 106.7890,
        //         'owner_id' => $admin->id,
        //         'slug' => 'rumah-tipe-36',
        //     ],
        //     [
        //         'name' => 'Apartemen Premium',
        //         'description' => 'Apartemen premium dengan fasilitas lengkap, gym, dan kolam renang. Cocok untuk profesional muda.',
        //         'address' => 'Jl. Kuningan No. 321',
        //         'city' => 'Jakarta Selatan',
        //         'price' => 1800000000,
        //         'bedrooms' => 2,
        //         'bathrooms' => 2,
        //         'area' => 80.00,
        //         'type' => 'apartemen',
        //         'status' => 'available',
        //         'amenities' => ['AC', 'WiFi', 'Gym', 'Kolam Renang', 'Security 24/7'],
        //         'features' => ['Premium', 'Fasilitas Lengkap', 'Lokasi Strategis'],
        //         'latitude' => -6.2276,
        //         'longitude' => 106.7997,
        //         'owner_id' => $admin->id,
        //         'slug' => 'apartemen-premium',
        //     ],
        //     [
        //         'name' => 'Rumah Tradisional Betawi',
        //         'description' => 'Rumah dengan arsitektur tradisional Betawi yang unik dan bernilai budaya tinggi.',
        //         'address' => 'Jl. Condet No. 654',
        //         'city' => 'Jakarta Timur',
        //         'price' => 850000000,
        //         'bedrooms' => 3,
        //         'bathrooms' => 2,
        //         'area' => 120.00,
        //         'type' => 'rumah_1_lantai',
        //         'status' => 'available',
        //         'amenities' => ['AC', 'Taman', 'Pendopo'],
        //         'features' => ['Tradisional', 'Budaya', 'Unik'],
        //         'owner_id' => $admin->id,
        //         'slug' => 'rumah-tradisional-betawi',
        //     ],
        // ];

        // foreach ($houses as $houseData) {
        //     House::create($houseData);
        // }
    }
}
