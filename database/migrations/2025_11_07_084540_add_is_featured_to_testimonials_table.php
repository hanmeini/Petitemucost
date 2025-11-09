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
        // Gunakan Schema::table() untuk MENGUBAH tabel yang sudah ada
        Schema::table('testimonials', function (Blueprint $table) {

            // Tambahkan semua kolom yang hilang
            // Kita tambahkan 'after('id')' agar rapi
            $table->foreignId('booking_id')->after('id')->constrained('bookings')->onDelete('cascade');
            $table->unsignedTinyInteger('rating')->after('booking_id'); // Rating 1-5
            $table->text('comment')->after('rating');
            $table->boolean('is_featured')->default(false)->after('comment');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Perintah ini untuk membatalkan (jika diperlukan)
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropForeign(['booking_id']);
            $table->dropColumn(['booking_id', 'rating', 'comment', 'is_featured']);
        });
    }
};

