<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'external_order_id'
    ];
}
