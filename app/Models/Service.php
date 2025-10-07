<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'dp_amount',
        'duration_minutes',
    ];

    /**
     * Mendefinisikan bahwa satu Layanan (Service) memiliki banyak Portfolio.
     */
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
