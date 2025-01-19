<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'refinery_id',
        'marketer_id', // unique identifier
        'purchase_id',
        'liters',
        'added_by',
        'status',
        'atc_number',
        'generated_by',
        'comment',
    ];


    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }


    public function marketer(){
        return $this->belongsTo(Marketer::class);
    }

    public function refinery(){
        return $this->belongsTo(Refinery::class);
    }

    
}
