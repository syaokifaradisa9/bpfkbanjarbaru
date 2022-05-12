<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user_id',
        'letter_name',
        'letter_number',
        'status'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
