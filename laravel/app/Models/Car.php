<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
         'user_id','make', 'model', 'year', 'color', 'transmission',
        'mileage', 'fuel_type', 'body_type', 'price', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
