<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RukoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Public routes untuk rumah
Route::get('/houses', [HouseController::class, 'index'])->name('houses.index');
Route::get('/houses/{id}', [HouseController::class, 'show'])->name('houses.show');

// Routes untuk booking (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Booking routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{houseId}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/{houseId}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{id}', [BookingController::class, 'cancel'])->name('bookings.cancel');
});

// Admin routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    // Product routes (existing)
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Category routes (existing)
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // House management routes
    Route::get('/houses', [HouseController::class, 'adminIndex'])->name('admin.houses.index');
    Route::get('/houses/create', [HouseController::class, 'create'])->name('admin.houses.create');
    Route::post('/houses', [HouseController::class, 'store'])->name('admin.houses.store');
    Route::get('/houses/{id}/edit', [HouseController::class, 'edit'])->name('admin.houses.edit');
    Route::put('/houses/{id}', [HouseController::class, 'update'])->name('admin.houses.update');
    Route::delete('/houses/{id}', [HouseController::class, 'destroy'])->name('admin.houses.destroy');

    // Booking management routes
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::get('/bookings/{id}', [BookingController::class, 'adminShow'])->name('admin.bookings.show');
    Route::put('/bookings/{id}', [BookingController::class, 'adminUpdate'])->name('admin.bookings.update');
    Route::get('/bookings/download/completed', [BookingController::class, 'downloadCompletedPDF'])->name('admin.bookings.download.completed');
});

Route::resource('ruko', RukoController::class);

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

require __DIR__.'/auth.php';
