<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
        protected $fillable = [
        'user_id',
        'message',
        'url',
        'read_at',
    ];

    /**
     * Relasi: Satu notifikasi dimiliki oleh satu User.
     * (Biar kita tahu siapa pemilik notif ini)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
