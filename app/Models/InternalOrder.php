<?php

namespace App\Models;

use App\Models\InternalAlkesOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternalOrder extends Model
{
    use HasFactory;

    public $fillable = [
        'number',
        'user_id',
        'letter_name',
        'status',

        // Estimasi Keberangkatan dan Sampai
        'delivery_date_estimation',
        'arrival_date_estimation',

        // Pihak Pengantar
        'delivery_option',
        'delivery_travel',

        // Contact Person Pihak Pengantar
        'contact_person_name',
        'contact_person_phone',

        // Keterangan Oleh Admin
        'description',

        // Informasi Penerimaan Alat
        'alkes_checker',
        'review_request',
        'calibration_ability',
        'officer_readiness',
        'workload',
        'equipment_condition',
        'calibration_method_compatibility',
        'accommodation_and_environment',
        'alkes_checker',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function internal_alkes_order(){
        return $this->hasMany(InternalAlkesOrder::class);
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
        $tempOrders = InternalAlkesOrder::with('alkes', 'client_desription')->where('internal_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            $categoryName = $order->alkes->alkes_category->name;
            if(isset($orders[$categoryName][$order->alkes->name])){
                $orders[$categoryName][$order->alkes->name]['ammount']++;
            }else{
                $orders[$categoryName][$order->alkes->name] = [
                    'alkes-id' => $order->alkes->id,
                    'ammount' => 1,
                    'price' => $order->alkes->price,
                    'description' => $order->client_desription,
                ];
            }
        }

        return $orders;
    }
}
