<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalOfficerOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_user_id',
        'internal_order_id'
    ];
}
