<?php

namespace App\Models;

use App\Models\AlkesCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alkes extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'name',
        'price',
        'minute_estimation',
        'image_name'
    ];

    public function alkes_category(){
        return $this->belongsTo(AlkesCategory::class);
    }

    public function instrument_alkes_group(){
        return $this->hasMany(InstrumentAlkesGroup::class);
    }
}
