<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalOrderExcelValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'internal_alkes_order_id',
        'cell',
        'value'
    ];
}
