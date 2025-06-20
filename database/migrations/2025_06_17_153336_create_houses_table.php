<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('city');
            $table->decimal('price', 15, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('area', 8, 2); // dalam meter persegi
            $table->enum('type', ['rumah', 'ruko']);
            $table->enum('status', ['tersedia', 'tidak_tersedia', 'dalam_booking'])->default('tersedia');
            $table->json('images')->nullable();
            $table->json('amenities')->nullable(); // fasilitas
            $table->json('features')->nullable(); // fitur khusus
            $table->unsignedBigInteger('owner_id');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['city', 'type', 'status']);
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
