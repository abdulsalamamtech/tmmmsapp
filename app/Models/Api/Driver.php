<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'added_by',
        'user_id',
        'transporter_id',
        'first_name',
        'last_name',
        'other_name',
        'license_number',
        'license_details',
        'status',
        'movement_status',
    ];    


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
