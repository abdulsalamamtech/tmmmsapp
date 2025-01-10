<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminDepartment extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
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


    public function addedBy()
    {
        return $this->belongsTo(User::class);
    }
}
