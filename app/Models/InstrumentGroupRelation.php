<?php

namespace App\Models;

use App\Models\MeasuringInstrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstrumentGroupRelation extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'measuring_instrument_id',
        'instrument_group_id'
    ];

    public function measuring_instrument(){
        return $this->belongsTo(MeasuringInstrument::class);
    }
}
