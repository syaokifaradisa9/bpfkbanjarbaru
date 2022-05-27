<?php

namespace App\Models;

use App\Models\ExternalOrderExcelValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternalAlkesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkes_id',
        'internal_order_id',
        'alkes_order_description_id'
    ];
}
