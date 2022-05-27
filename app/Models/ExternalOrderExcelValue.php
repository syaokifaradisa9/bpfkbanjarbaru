<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalOrderExcelValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_alkes_order_id',
        'cell',
        'value'
    ];
}
