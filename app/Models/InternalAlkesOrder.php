<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternalAlkesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkes_id',
        'internal_order_id',

        // keterangan Oleh Fasyankes
        'client_description_id',
        // Keterangan Oleh Petugas
        'admin_description_id',

        // Aksesoris
        'alkes_accessories_id',

        // Informasi Alat
        'merk',
        'model',
        'function',
        'series_number',

        'is_laik',
        'officer',
    ];

    public function alkes_accessories(){
        return $this->belongsTo(AlkesAccessories::class);
    }

    public function alkes(){
        return $this->belongsTo(Alkes::class);
    }

    public function client_desription(){
        return $this->belongsTo(AlkesOrderDescription::class, 'client_description_id');
    }

    public function admin_desription(){
        return $this->belongsTo(AlkesOrderDescription::class, 'admin_description_id');
    }

    public function internal_order(){
        return $this->belongsTo(InternalOrder::class);
    }

    public function internal_order_excel_value(){
        return $this->hasMany(InternalOrderExcelValue::class);
    }

    public function internal_officer_order(){
        return $this->hasMany(InternalOfficerOrder::class);
    }

    protected $appends = [
        'status', 
    ];

    public function getStatusAttribute()
    {
        $excel = InternalOrderExcelValue::where('internal_alkes_order_id', $this->id)->first();
        return $excel != null ? 1 : 0;
    }
}
