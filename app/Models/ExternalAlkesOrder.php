<?php

namespace App\Models;

use App\Models\User;
use App\Models\Alkes;
use App\Models\ExternalOrderExcelValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExternalAlkesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkes_id',
        'external_order_id',
        'alkes_order_description_id',
        'officer',
        'is_success'
    ];

    public function alkes(){
        return $this->belongsTo(Alkes::class);
    }

    public function external_order(){
        return $this->belongsTo(ExternalOrder::class);
    }

    public function external_order_excel_value(){
        return $this->hasMany(ExternalOrderExcelValue::class);
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
