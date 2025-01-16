<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Truck extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'driver_id',
        'added_by',
        'name',
        'description',
        'truck_number',
        'quantity',
        'compartment',
        'calibrate_one',
        'calibrate_two',
        'calibrate_three',
        'status',
        'movement_status',
        'transporter_id',
    ];
}
