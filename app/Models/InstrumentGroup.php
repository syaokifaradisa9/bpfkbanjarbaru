<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
