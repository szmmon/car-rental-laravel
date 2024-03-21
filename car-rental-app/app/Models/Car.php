<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable =[
        'image_path',
        'name',
        'year',
        'description',
        'daily_price'
    ];
    public function booking_confirmeds(): HasMany
    {
        return $this->hasMany(BookingConfirmed::class);
    }
}
