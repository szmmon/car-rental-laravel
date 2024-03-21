<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BookingConfirmed extends Model
{
        use HasFactory;

        protected $fillable = [
        'user_id',
        'car_id',
        'location',
        'pick_up_date',
        'return_date',
        'total_price'
        ];

        public function users() :BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function cars() :BelongsTo
        {
            return $this->belongsTo(Car::class);
        }
}
