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
            'fasyankes_name' => ['required', 'min:3', 'max:255'],
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
            'fasyankes_name.required' => 'Nama Fasyankes Tidak Boleh Kosong!',
            'fasyankes_name.min' => 'Nama Fasyankes Harus Memiliki Paling Tidak 3 karakter!',
            'fasyankes_name.max' => 'Nama Fasyankes Terlalu Panjang!',
            'phone.required' => 'Nomor Telepon Tidak Boleh Kosong!',
            'type.required' => 'Mohon Pilih Tipe Fasyankes Anda!',
            'category.required' => 'Mohon Pilih Kategori Fasyankes Anda!',
            'province.required' => 'Mohon Pilih Provinsi Dimana Fasyankes Anda Berada!',
            'city.required' => 'Mohon Pilih Kota Dimana Fasyankes Anda Berada!',
            'address.required' => 'Mohon Isikan Alamat Lengkap Fasyankes Anda Berada!',
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
