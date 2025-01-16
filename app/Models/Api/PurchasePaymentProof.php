<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasePaymentProof extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'purchase_id',
        'marketer_id',
        'asset_id',
        'bank_name',
        'reference_number',
        'amount',
        'currency',
        'payment_status',
        'comment',
        'added_by'
    ];
}
