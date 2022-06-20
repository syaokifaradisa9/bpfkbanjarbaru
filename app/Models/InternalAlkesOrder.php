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

        // Informasi Alat
        'merk',
        'model',
        'function',
        'series_number'
    ];

    public function alkes(){
        return $this->belongsTo(Alkes::class);
    }

    public function client_desription(){
        return $this->belongsTo(AlkesOrderDescription::class, 'client_description_id');
    }

    public function admin_desription(){
        return $this->belongsTo(AlkesOrderDescription::class, 'admin_description_id');
    }
}
