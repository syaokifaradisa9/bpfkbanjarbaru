<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalOfficerOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_user_id',
        'internal_alkes_order_id'
    ];

    public function internal_alkes_order(){
        return $this->belongsTo(InternalAlkesOrder::class);
    }

    public function admin_user(){
        return $this->belongsTo(AdminUser::class);
    }


}
