<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExternalOrderRequest extends FormRequest
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
            'letter' => 'required|mimes:pdf,doc,docx|max:10000',
            'letter_number' => 'required',
            'letter_date' => 'required|before_or_equal:today',
        ];
    }

    public function messages(){
        return [
            'letter.required' => 'File Surat Permohonan Harus Dilampirkan!',
            'letter.mimes' => 'File Harus Berupa pdf, doc atau docx!',
            'letter.max' => 'File Harus Memiliki Ukuran Dibawah 10mb',
            'letter_number.required' => 'Nomor Surat Permohonan Tidak Boleh Kosong!',
            'letter_date.required' => 'Tanggal Surat Permohonan Tidak Boleh Kosong!',
            'letter_date.before_or_equal' => 'Tanggal Surat Permohonan Tidak Boleh Lebih Dari Hari Ini!'
        ];
    }
}
