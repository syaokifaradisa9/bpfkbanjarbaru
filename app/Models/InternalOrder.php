<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalOrder extends Model
{
    use HasFactory;

    public $fillable = [
        'number',
        'user_id',
        'letter_name',
        'delivery_date_estimation',
        'delivery_option',
        'delivery_travel',
        'arrival_date_estimation',
        'contact_person_name',
        'contact_person_phone',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // Atribut Tambahan
    protected $appends = [
        'letter_path',
        'alkes_order_with_category',
    ];

    public function getLetterPathAttribute()
    {
        return 'order/'.$this->user->id.'/internal/file/'.$this->letter_name;
    }

    public function getAlkesOrderWithcategoryAttribute(){
        $orders = [];
        $tempOrders = InternalAlkesOrder::with('alkes')->where('internal_order_id', $this->id)->get();
        foreach($tempOrders as $order){
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

        return $orders;
    }
}
