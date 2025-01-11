<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'added_by',
        'user_id',
        'marketer_id',
        'first_name',
        'last_name',
        'other_name',
        'status',
    ];    


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
