<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExternalAlkesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkes_id',
        'external_order_id',
        'alkes_order_description_id',
        'minute_estimation'
    ];

    public function alkes(){
        return $this->belongsTo(Alkes::class);
    }
}
