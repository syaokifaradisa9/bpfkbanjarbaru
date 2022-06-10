<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlkesCategory extends Model
{
    use HasFactory;
    
    public function alkes(){
        return $this->hasMany(Alkes::class);
    }
}
