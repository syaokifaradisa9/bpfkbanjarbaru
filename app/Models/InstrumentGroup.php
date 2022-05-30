<?php

namespace App\Models;

use App\Models\InstrumentGroupRelation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstrumentGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function instrument_group_relation(){
        return $this->hasMany(InstrumentGroupRelation::class);
    }
}
