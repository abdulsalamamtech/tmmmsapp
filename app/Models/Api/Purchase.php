<?php

namespace App\Models\Api;

use App\Models\Marketer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'refinery_id',
        'marketer_id',
        'product_id',
        'amount',
        'liters',
        
        'pfi_number',
        'approved_by',
        'comment',
        'status',
    ];

    public function refinery()
    {
        return $this->belongsTo(Refinery::class);
    }

    public function marketer()
    {
        return $this->belongsTo(Marketer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
