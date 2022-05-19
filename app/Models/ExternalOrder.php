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

    // Atribut Tambahan
    protected $appends = ['total_accommodation', 'total_alkes_price', 'total_payment', 'alkes_order_with_category'];
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

    // Relasi
    public function external_alkes_order(){
        return $this->hasMany(ExternalAlkesOrder::class);
    }
}
