<?php

namespace App\Models;

use App\Models\ExternalOfficerOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // Atribut Tambahan
    protected $appends = [
        'total_accommodation', 
        'total_alkes_price', 
        'total_payment', 
        'alkes_order_with_category',
        'estimation_day',
        'total_officer_selected'
    ];

    public function getTotalAccommodationAttribute()
    {
        if(isset($this->lodging_accommodation)){
            return $this->lodging_accommodation + $this->transportation_accommodation + $this->rapid_test_accommodation + $this->daily_accommodation;
        }else{
            return 0;
        }
    }

    public function getTotalAlkesPriceAttribute()
    {
        $alkesOrders = ExternalAlkesOrder::with('alkes')->where('external_order_id', $this->id)->get();
        $total = 0;
        foreach($alkesOrders as $alkesOrder){
            $total += $alkesOrder->alkes->price;
        }
        return $total;
    }

    public function getTotalPaymentAttribute()
    {
        return $this->total_accommodation + $this->total_alkes_price;
    }

    public function getAlkesOrderWithcategoryAttribute(){
        $orders = [];
        $tempOrders = ExternalAlkesOrder::with('alkes')->where('external_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            $categoryName = $order->alkes->alkes_category->name;
            if(isset($orders[$categoryName])){
                if(isset($orders[$categoryName][$order->alkes->name])){
                    $orders[$categoryName][$order->alkes->name]['ammount']++;
                }
            }else{
                $orders[$categoryName] = [
                    $order->alkes->name => [
                        'ammount' => 1,
                        'price' => $order->alkes->price,
                        'description' => $order->description
                    ]
                ];
            }
        }

        return $orders;
    }

    public function getEstimationDayAttribute(){
        $order = ExternalOrder::findOrFail($this->id);
        if($order->total_officer){
            $pp_hour = $order->pp_hour;
            $pp_minute = $order->pp_minute;
            $total_officer = $order->total_officer;

            $total_minute = 0;
            foreach($order->external_alkes_order as $alkesOrder){
                $total_minute += $alkesOrder->alkes->minute_estimation;
            }

            // Total Waktu
            $total_time = ($total_minute/60)/7;

            // Jumlah Hari / Jumlah Petugas
            $total_alkes_day = $total_time/$total_officer;

            // Jumlah Hari setelah ditambah perjalanan
            $total_day = $total_alkes_day + (($pp_minute/60 + $pp_hour)/7);

            return $total_day;
        }else{
            return 0;
        }
    }

    public function getTotalOfficerSelectedAttribute(){
        return count($this->external_officer_order) ?? 0;
    }

    // Relasi Tabel
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function external_alkes_order(){
        return $this->hasMany(ExternalAlkesOrder::class);
    }

    public function external_officer_order(){
        return $this->hasMany(ExternalOfficerOrder::class);
    }
}
