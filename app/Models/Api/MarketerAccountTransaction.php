<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketerAccountTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'refinery_id',
        'refinery_id',
        'marketer_id',
        'marketer_account_id',
        'transaction_type',
        'amount',
        'description',
        'status',
    ];
}
