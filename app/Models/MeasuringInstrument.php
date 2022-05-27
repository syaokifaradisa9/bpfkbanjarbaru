<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasuringInstrument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'merk', 'model', 'serial_number'];
}
