<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketerDepartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'marketer_id',
        'added_by', // The admin user id that added this user
        'role',
        'responsibility_description',
        'zone',
        'state'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }    
}
