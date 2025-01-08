<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'body_type',
        'transmission',
        'mileage',
        'fuel_type',
        'engine_size',
        'horsepower',
        'registration_year',
        'condition',
        'price',
        'vin',
        'status',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
