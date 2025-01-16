<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'program_id',
        'driver_id',
        'truck_id',
        'longitude',
        'latitude',
        'description',
        'status'
    ];
}
