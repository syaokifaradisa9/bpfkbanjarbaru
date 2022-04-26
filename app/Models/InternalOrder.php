<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalOrder extends Model
{
    use HasFactory;

    public $fillable = [
        'number',
        'user_id',
        'covering_letter_path',
        'delivery_date_estimation',
        'delivery_option',
        'delivery_travel',
        'arrival_date_estimation'
    ];
}
