<?php

namespace App\Models;

use App\Models\InternalPayment;
use App\Models\InternalAlkesOrder;
use App\Models\InternalOfficerOrder;
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
        'review_request',
        'calibration_ability',
        'officer_readiness',
        'workload',
        'equipment_condition',
        'calibration_method_compatibility',
        'accommodation_and_environment',
        'alkes_checker',
        'alkes_receiver',
        'receiver_description',

        // Tanggal
        'receive_date',
        'done_estimation_date',

        // Penyerahan Alat
        'contact_person_receiver_name',
        'contact_person_receiver_phone',
        'alkes_accordingly',
        'certificate_handedover',
        'cancel_test',
        'alkes_checked'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function internal_alkes_order(){
        return $this->hasMany(InternalAlkesOrder::class);
    }

    public function internal_payment(){
        return $this->hasMany(InternalPayment::class);
    }

    // Atribut Tambahan
    protected $appends = [
        'letter_path',
        'alkes_order_with_category',
        'clean_alkes_orders',
        'clean_result_alkes_orders',
        'total_officer',
        'done_alkes_order',
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

    public function getCleanAlkesOrdersAttribute(){
        $alkesOrders = [];
        $tempOrders = InternalAlkesOrder::with('alkes')->where('internal_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            $alkes = $order->alkes->name . "|" . $order->merk. "|" . $order->model . "|" . $order->series_number . "|" . $order->alkes->price . "|" . $order->function . "|" . $order->alkes_accessories->accessories. "|" . $order->admin_desription->description;
            if(isset($alkesOrders[$alkes])){
                $alkesOrders[$alkes]['ammount']++;
            }else{
                $alkesOrders[$alkes] = [
                    'ammount' => 1,
                    'id' => $order->id
                ];
            }
        }

        ksort($alkesOrders);

        $orders = [];
        foreach($alkesOrders as $alkes => $value){
            $alkesAttribute = explode('|', $alkes);
            array_push($orders, [
                'id' => $value['id'],
                'alkes' => $alkesAttribute[0],
                'merk' => $alkesAttribute[1],
                'model' => $alkesAttribute[2],
                'series_number' => $alkesAttribute[3],
                'price' => $alkesAttribute[4],
                'function' => $alkesAttribute[5],
                'accessories' => $alkesAttribute[6],
                'admin_description' => $alkesAttribute[7],
                'ammount' => $value['ammount']
            ]);
        }
        return $orders;
    }

    public function getCleanResultAlkesOrdersAttribute(){
        $alkesOrders = [];
        $tempOrders = InternalAlkesOrder::with('alkes')->where('internal_order_id', $this->id)->get();
        foreach($tempOrders as $order){
            $alkes = $order->alkes->name . "|" . $order->merk. "|" . $order->model . "|" . $order->series_number . "|" . $order->is_laik;
            if(isset($alkesOrders[$alkes])){
                $alkesOrders[$alkes]['ammount']++;
            }else{
                $alkesOrders[$alkes] = [
                    'ammount' => 1
                ];
            }
        }

        ksort($alkesOrders);

        $orders = [];
        foreach($alkesOrders as $alkes => $value){
            $alkesAttribute = explode('|', $alkes);
            array_push($orders, [
                'alkes' => $alkesAttribute[0],
                'merk' => $alkesAttribute[1],
                'model' => $alkesAttribute[2],
                'series_number' => $alkesAttribute[3],
                'status_laik' => $alkesAttribute[4] == 1 ? "Laik Pakai" : "Tidak Laik Pakai",
                'ammount' => $value['ammount']
            ]);
        }
        return $orders;
    }

    public function getTotalOfficerAttribute(){
        $alkesOrders = $this->internal_alkes_order;

        $total = 0;
        foreach($alkesOrders as $alkesOrder){
            $total += $alkesOrder->internal_officer_order->groupBy('admin_user_id')->count();
        }
       
        return $total;
    }

    public function getDoneAlkesOrderAttribute(){
        $orders = [];
        $tempOrders = InternalAlkesOrder::with('alkes')->where('internal_order_id', $this->id)->get();
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
}
