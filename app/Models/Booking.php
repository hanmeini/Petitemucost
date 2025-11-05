<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Service;
use App\Models\User;
use App\Models\Payment;

class Booking extends Model
{
    use HasFactory;

    /**
     * Properti yang boleh diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'service_id',
        'booking_date',
        'booking_time',
        'location_address', // <-- TAMBAHKAN INI
        'notes',
        'status',
        'dp_amount',
    ];

    /**
     * Mengubah tipe data 'booking_date' menjadi objek Carbon (opsional tapi bagus).
     */
    protected $casts = [
        'booking_date' => 'date',
    ];

    /**
     * Relasi: Booking ini dimiliki oleh satu Klien (User).
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * Relasi: Booking ini memesan satu Layanan (Service).
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Relasi: Booking ini memiliki satu Pembayaran (Payment).
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
