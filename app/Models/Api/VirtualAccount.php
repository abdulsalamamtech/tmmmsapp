<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualAccount extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'belongs_to', // marketer, transporter, driver
        'balance',
        'bank',
        'account_number',
        'currency', // USD, EUR, EUR, NGN
        'daily_limit',
        'monthly_limit',
        'security_pin', // 1234
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
