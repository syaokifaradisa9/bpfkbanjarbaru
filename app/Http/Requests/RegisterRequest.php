<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fasyenkes_name' => ['required', 'min:3', 'max:255'],
            'phone' => ['required'],
            'type' =>  ['required'],
            'category' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:7'],
            'c_password' => ['required', 'same:password']
        ];
    }

    public function messages(){
        return [
            'fasyenkes_name.required' => 'Nama Fasyenkes Tidak Boleh Kosong!',
            'fasyenkes_name.min' => 'Nama Fasyenkes Harus Memiliki Paling Tidak 3 karakter!',
            'fasyenkes_name.max' => 'Nama Fasyenkes Terlalu Panjang!',
            'phone.required' => 'Nomor Telepon Tidak Boleh Kosong!',
            'type.required' => 'Mohon Pilih Tipe Fasyenkes Anda!',
            'category.required' => 'Mohon Pilih Kategori Fasyenkes Anda!',
            'province.required' => 'Mohon Pilih Provinsi Dimana Fasyenkes Anda Berada!',
            'city.required' => 'Mohon Pilih Kota Dimana Fasyenkes Anda Berada!',
            'address.required' => 'Mohon Isikan Alamat Lengkap Fasyenkes Anda Berada!',
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Mohon Masukkan Email yang Valid!',
            'email.unique' => 'Email Sudah Terdaftar!',
            'password.required' => 'Password Tidak Boleh Kosong!',
            'password.min' => 'Password Harus Memiliki Paling Tidak 7 Karakter!',
            'c_password.required' => 'Konfirmasi Password Tidak Boleh Kosong!',
            'c_password.same' => 'Konfirmasi Password Harus Sama Dengan Password!'
        ];
    }
}
