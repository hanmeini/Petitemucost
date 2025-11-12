<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom untuk ID dari Google, boleh kosong
            $table->string('google_id')->nullable()->after('password');
            // Kolom untuk menyimpan URL foto avatar
            $table->string('avatar')->nullable()->after('google_id');

            // Ubah password agar boleh kosong, karena login Google tidak pakai password
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google_id', 'avatar']);
            $table->string('password')->nullable(false)->change();
        });
    }
};
