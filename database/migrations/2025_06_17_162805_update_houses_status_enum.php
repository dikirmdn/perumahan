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
        Schema::table('houses', function (Blueprint $table) {
            // Drop the old enum column
            $table->dropColumn('status');
        });

        Schema::table('houses', function (Blueprint $table) {
            // Add the new enum column with updated values
            $table->enum('status', ['available', 'booked', 'unavailable'])->default('available')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('houses', function (Blueprint $table) {
            // Drop the new enum column
            $table->dropColumn('status');
        });

        Schema::table('houses', function (Blueprint $table) {
            // Add back the old enum column
            $table->enum('status', ['tersedia', 'tidak_tersedia', 'dalam_booking'])->default('tersedia')->after('type');
        });
    }
};
