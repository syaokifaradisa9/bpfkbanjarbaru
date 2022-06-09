<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalOfficerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_user_id',
        'external_order_id',
        'role'
    ];

    public function admin_user(){
        return $this->belongsTo(AdminUser::class);
    }

    public function external_order(){
        return $this->belongsTo(ExternalOrder::class);
    }
}
