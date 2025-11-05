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
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->text('location_address');
            $table->text('notes')->nullable();

            $table->enum('status', [
                'menunggu_konfirmasi',
                'menunggu_pembayaran_dp',
                'menunggu_verifikasi_pembayaran',
                'terkonfirmasi',
                'selesai',
                'dibatalkan'
            ])->default('menunggu_konfirmasi');
            $table->unsignedInteger('dp_amount');

            $table->timestamps();
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

