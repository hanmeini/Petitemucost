<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'amount',
        'proof_of_payment',
        'verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    /**
     * Mendefinisikan bahwa satu Pembayaran (Payment) dimiliki oleh satu Booking.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

