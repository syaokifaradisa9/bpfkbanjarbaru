<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user_id',
        'letter_name',
        'letter_number',
        'out_letter_number',
        'letter_date',
        'status',
        'pp_hour',
        'pp_minute',
        'total_officer',
        'lodging_accommodation',
        'lodging_description',
        'transportation_accommodation',
        'transportation_description',
        'daily_accommodation',
        'daily_description',
        'rapid_test_accommodation',
        'rapid_test_description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $appends = ['total_accommodation'];
    public function getTotalAccommodationAttribute()
    {
        if(isset($this->lodging_accommodation)){
            return $this->lodging_accommodation + $this->transportation_accommodation + $this->rapid_test_accommodation + $this->daily_accommodation;
        }else{
            return 0;
        }
    }

    public function external_alkes_order(){
        return $this->hasMany(ExternalAlkesOrder::class);
    }
}
