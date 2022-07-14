<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternalOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivery_date_estimation' => 'required|date|after_or_equal:today',
            'arrival_date_estimation' => 'required|date|after_or_equal:today',
            'delivery_option' => 'required',
            'delivery_travel_name' => 'nullable|required_if:delivery_option,!=,Diantar oleh pihak pertama',
            'contact_person_name' => 'required',
            'contact_person_phone' => 'required',
            'letter' => 'mimes:pdf,doc,docx|max:10000'
        ];
    }

    public function messages(){
        return [
            'delivery_date_estimation.required' => 'Estimasi Tanggal Pengiriman Harus ditetapkan!',
            'delivery_date_estimation.date' => 'Estimasi Tanggal Pengiriman Harus Berupa Tanggal!',
            'delivery_date_estimation.after_or_equal' => 'Estimasi Tanggal Pengiriman Tidak Boleh Kurang Dari Hari ini!',
            'arrival_date_estimation.required' => 'Estimasi Tanggal Sampai Harus ditetapkan!',
            'delivery_date_estimation.date' => 'Estimasi Tanggal Pengiriman Harus Berupa Tanggal!',
            'delivery_date_estimation.after_or_equal' => 'Estimasi Tanggal Sampai Tidak Boleh Kurang Dari Hari ini!',
            'delivery_option.required' => 'Opsi Pengiriman Harus Dipilih',
            'delivery_travel_name.required_if' => 'Nama Pihak Ketiga Tidak Boleh Kosong!',
            'contact_person_name.required' => 'Nama Lengkap Pengantar Tidak Boleh Kosong!',
            'contact_person_phone.required' => 'Nomor Telepon Pengantar Tidak Boleh Kosong!',
            'letter.mimes' => 'File Surat Harus Berupa pdf, doc atau docx!',
            'letter.max' => 'File Maksimum Harus Kurang Dari 10mb!'
        ];
    }
}
