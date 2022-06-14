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
        'letter_name',
        'delivery_date_estimation',
        'delivery_option',
        'delivery_travel',
        'arrival_date_estimation'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Atribut Tambahan
    protected $appends = [
        'letter_path'
    ];

    public function getLetterPathAttribute()
    {
        return 'order/'.$this->user->id.'/internal/file/'.$this->letter_name;
    }
}
