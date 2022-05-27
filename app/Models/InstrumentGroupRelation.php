<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentGroupRelation extends Model
{
    use HasFactory;
    protected $fillable = [
        'measuring_instrument_id',
        'instrument_group_id'
    ];
}
