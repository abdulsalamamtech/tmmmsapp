<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseMessage extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'refinery_id',
        'marketer_id',
        'purchase_id',
        'comment_by_refinery',
        'comment_by_marketer'
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
