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
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:7'],
            'confirmation_password' => ['required', 'same:password']
        ];
    }

    public function messages(){
        return [
            'fasyenkes_name.required' => 'Nama Fasyenkes Tidak Boleh Kosong!',
            'fasyenkes_name.min' => 'Nama Fasyenkes Harus Memiliki Paling Tidak 3 karakter!',
            'fasyenkes_name.max' => 'Nama Fasyenkes Terlalu Panjang!',
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Mohon Masukkan Email yang Valid!',
            'email.unique' => 'Email Sudah Terdaftar!',
            'password.required' => 'Password Tidak Boleh Kosong!',
            'password.min' => 'Password Harus Memiliki Paling Tidak 7 Karakter!',
            'confirmation_password.same' => 'Konfirmasi Password Harus Sama Dengan Password!'
        ];
    }
}
