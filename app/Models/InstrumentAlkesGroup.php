<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentAlkesGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'alkes_id',
        'measuring_instrument_group_id'
    ];
}
