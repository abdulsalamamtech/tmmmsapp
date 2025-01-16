<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualAccountTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'virtual_account_id',
        'transaction_type',
        'amount',
        'description',
        'status',
    ];
}
