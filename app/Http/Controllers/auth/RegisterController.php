<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterVerificationMail;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register', [
            'title' => 'Halaman Register'
        ]);
    }

    public function store(RegisterRequest $request){
        $user_count = User::count();

        $user = User::create([
            'fasyenkes_name' => $request->fasyenkes_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hash' => md5("bpfkbanj".$user_count.$request->mail)
        ]);

        Mail::to($user->email)->send(new RegisterVerificationMail($user));
        return redirect('/register/notify/'. $user->hash);
    }

    public function notify($token){
        $user = User::where('hash', $token)->get()->first();
        if($user->email_verified_at){
            return redirect(route('register.index'));
        }

        return view('auth.register_notify',[
            'title' => 'Verifikasi Pendaftaran',
            'email' => $user->email
        ]);
    }

    public function verify($token) {
        $user = User::where('hash', $token)->get()->first();

        if(!$user->isVerified()){
            $user->email_verified_at = time();
            $user->save();

            return redirect(route('login.index'))->with('success', 'Sukses memverifikasi pendaftaran, silahkan login menggunakan email dan password yang telah didaftarkan sebelumnya!');
        }

        return redirect(route('login.index'));
    }
}
