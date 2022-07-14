<?php

namespace App\Models;

use App\Models\User;
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
        'accommodation',
        'accommodation_description',
        'daily_accommodation',
        'daily_description',
        'rapid_test_accommodation',
        'rapid_test_description',
        'finishing_date',
        'approval_letter_name'
    ];

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

    public function external_payment(){
        return $this->hasMany(ExternalPayment::class);
    }

    public function activity_date_order(){
        return $this->hasMany(ActivityDateOrder::class);
    }

    // Atribut Tambahan
    protected $appends = [
        'total_accommodation', 
        'total_alkes_price', 
        'total_payment', 
        'alkes_order_with_category',
        'done_alkes_order',
        'estimation_day',
        'total_officer_selected',
        'letter_path',
        'approval_letter_path'
    ];

    public function getTotalAccommodationAttribute()
    {
        if(isset($this->accommodation)){
            return $this->accommodation + $this->rapid_test_accommodation + $this->daily_accommodation;
        }else{
            return 0;
        }
    }

    public function getTotalAlkesPriceAttribute()
    {
        $alkesOrders = ExternalAlkesOrder::with('alkes')->where('external_order_id', $this->id)->get();
        
        $condition1 = $this->status == "MENUNGGU PEMBAYARAN";
        $condition2 = $this->status == "SELESAI";
        
        $total = 0;
        if($condition1 || $condition2){
            foreach($alkesOrders as $alkesOrder){
                if($alkesOrder->status == 1){
                    $total += $alkesOrder->alkes->price;
                }
            }
        }else{
            foreach($alkesOrders as $alkesOrder){
                $total += $alkesOrder->alkes->price;
            }
        }
        
        return $total;
    }

    public function getTotalPaymentAttribute()
    {
        return $this->total_accommodation + $this->total_alkes_price;
    }

    public function getAlkesOrderWithcategoryAttribute(){
        $orders = [];
        $tempOrders = ExternalAlkesOrder::with('alkes', 'alkes_order_description')->where('external_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            $categoryName = $order->alkes->alkes_category->name;
            if(isset($orders[$categoryName][$order->alkes->name])){
                $orders[$categoryName][$order->alkes->name]['ammount']++;
            }else{
                $orders[$categoryName][$order->alkes->name] = [
                    'ammount' => 1,
                    'price' => $order->alkes->price,
                    'description' => $order->alkes_order_description
                ];
            }
        }

        return $orders;
    }

    public function getDoneAlkesOrderAttribute(){
        $orders = [];
        $tempOrders = ExternalAlkesOrder::with('alkes')->where('external_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            if($order->status == 1){
                $categoryName = $order->alkes->alkes_category->name;
                if(isset($orders[$categoryName][$order->alkes->name])){
                    $orders[$categoryName][$order->alkes->name]['ammount']++;
                }else{
                    $orders[$categoryName][$order->alkes->name] = [
                        'ammount' => 1,
                        'price' => $order->alkes->price,
                        'description' => $order->description
                    ];
                }
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

    public function getletterPathAttribute()
    {
        return 'order/'.$this->user->id.'/insitu/file/'.$this->letter_name;
    }

    public function getApprovalLetterPathAttribute()
    {
        return 'order/'.$this->user->id.'/insitu/file/'.$this->approval_letter_name;
    }
}
