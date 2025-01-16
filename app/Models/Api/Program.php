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
        'marketer_id',
        'purchase_id',
        'atc_number',
        'status',
        'generated_by',
        'comment',
        'added_by'
    ];
}
