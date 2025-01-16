<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketerAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'refinery_id',
        'marketer_id',
        'accounts_type',
        'amount',
        'credit',
        'debit'
    ];


    public function refinery(){
        return $this->belongsTo(Refinery::class);
    }
}
