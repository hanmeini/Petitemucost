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
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom 'role' setelah kolom 'password'
            $table->enum('role', ['admin', 'client'])->default('client')->after('password');
            // Menambahkan kolom 'phone_number' setelah 'role', bisa kosong
            $table->string('phone_number')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone_number']);
        });
    }
};
