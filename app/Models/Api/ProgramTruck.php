<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramTruck extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'program_id',
        'truck_id',
        'liters',
        'status',
        'liters_lifted',

        'customer_id',
        'meter_ticket_number',
        'waybill_number',
    ];
}
