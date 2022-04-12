<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email Tidak Boleh Kosong!',
            'email.email' => 'Masukkan Email yang Valid!',
            'email.exists' => 'Email Belum Terdaftar, SIlahkan Mendaftar Terlebih Dahulu!',
            'password.required' => 'Password Tidak Boleh Kosong!'
        ];
    }
}
