<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasuringInstrument extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string'; 
    protected $fillable = ['name', 'merk', 'type_model', 'type_model_category', 'serial_number'];
}
