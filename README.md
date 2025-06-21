# 🏠 Website Booking Rumah

Website Booking Rumah adalah aplikasi web yang dibangun menggunakan [Laravel](https://laravel.com) dan [Tailwind CSS](https://tailwindcss.com) yang memungkinkan pengguna untuk mencari, melihat detail, dan memesan rumah secara online. Proyek ini dirancang dengan fokus pada tampilan modern, user experience yang baik, dan fungsionalitas pemesanan yang efisien.

## 🚀 Fitur Utama

-   🔍 Pencarian rumah berdasarkan lokasi, harga, dan kategori
-   📋 Detail lengkap rumah (deskripsi, fasilitas, galeri foto)
-   📝 Sistem pemesanan rumah online
-   👥 Autentikasi pengguna (register, login, logout)
-   🧑‍💼 Panel admin untuk mengelola data rumah dan pemesanan
-   📋 Download laporan ke PDF

## 🛠️ Teknologi yang Digunakan

| Teknologi                  | Keterangan                     |
| -------------------------- | ------------------------------ |
| Laravel                    | Framework PHP untuk backend    |
| Tailwind CSS               | Framework utility-first CSS    |
| MySQL                      | Basis data relasional          |
| Blade                      | Template engine Laravel        |
| Laravel Breeze             | Autentikasi pengguna           |

## 📦 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/booking-rumah.git
cd booking-rumah
```

### 2. Install Dependency

Pastikan Anda sudah menginstal [Composer](https://getcomposer.org/) dan [Node.js](https://nodejs.org/).

Install dependensi backend dan frontend dengan perintah berikut:

```bash
composer install
npm install
```
### 3. Copy .env.example to .env and configure db connection

```bash
cp .env.example .env
```
### 4. Generate application key

```bash
php artisan key:generate
```
### 5. Migrate db
```bash
php artisan migrate --seed
```

### 6. Run the server
```bash
php artisan serve
npm run dev
```
