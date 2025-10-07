<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'image_path',
        'caption',
    ];

    /**
     * Mendefinisikan bahwa satu Portfolio dimiliki oleh satu Layanan (Service).
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

