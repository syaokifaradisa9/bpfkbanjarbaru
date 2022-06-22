<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityDateOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'external_order_id'
    ];

    // Atribut Tambahan
    protected $appends = [
        'difference_day'
    ];

    public function getDifferenceDayAttribute()
    {
        $endDate = Carbon::parse($this->end_date);
        $startDate = Carbon::parse($this->start_date);
        return $endDate->diffInDays($startDate);
    }
}
