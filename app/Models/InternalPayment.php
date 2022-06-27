<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'internal_order_id'
    ];
}
