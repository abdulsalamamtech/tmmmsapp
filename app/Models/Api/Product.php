<?php

namespace App\Models\Api;

use App\Models\ProductType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_type_id',
        'price',
        'added_by',
        'refinery_id',
        'status'
    ];

    // Relationships

    // The refinery owns the product
    public function refinery(){
        return $this->belongsTo(Refinery::class);
    }

    // The user that added the product from the refinery
    public function addedBy(){
        return $this->belongsTo(User::class, 'added_by');
    }

    // The type of product
    public function productType(){
        return $this->belongsTo(ProductType::class);
    }
}
