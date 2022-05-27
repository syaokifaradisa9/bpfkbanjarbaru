<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExternalAlkesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkes_id',
        'external_order_id',
        'alkes_order_description_id',
        'officer'
    ];

    public function alkes(){
        return $this->belongsTo(Alkes::class);
    }

    public function external_order(){
        return $this->belongsTo(ExternalOrder::class);
    }

    protected $appends = [
        'status', 
    ];

    public function getStatusAttribute()
    {
        $excel = ExternalOrderExcelValue::where('external_alkes_order_id', $this->id)->first();
        return $excel != null ? 1 : 0;
    }
}
