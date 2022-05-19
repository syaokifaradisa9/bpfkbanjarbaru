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
        'minute_estimation'
    ];

    public function alkes_category(){
        return $this->belongsTo(AlkesCategory::class);
    }
}
