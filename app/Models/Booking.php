<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'service_id',
        'booking_date',
        'booking_time',
        'location',
        'notes',
        'status',
    ];

    /**
     * Mendefinisikan bahwa satu Booking dimiliki oleh satu User (Klien).
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * Mendefinisikan bahwa satu Booking memesan satu Layanan (Service).
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Mendefinisikan bahwa satu Booking memiliki satu Pembayaran (Payment).
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Mendefinisikan bahwa satu Booking menghasilkan satu Testimonial.
     */
    public function testimonial()
    {
        return $this->hasOne(Testimonial::class);
    }
}

