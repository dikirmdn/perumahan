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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('house_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('booking_date');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_price', 15, 2);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->integer('guest_count');
            $table->json('special_requests')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['house_id', 'check_in_date', 'check_out_date']);
            $table->index(['user_id', 'status']);
            $table->index('booking_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
