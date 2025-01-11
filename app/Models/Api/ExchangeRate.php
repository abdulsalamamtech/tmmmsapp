<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExchangeRate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'refinery_id',
        'added_by', // The admin user id that added this user
        'naira',
        'dollar'
    ];


    public function addedBy()
    {
        return $this->belongsTo(User::class);
    }
}
