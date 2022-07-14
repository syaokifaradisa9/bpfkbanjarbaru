<?php

namespace App\Http\Controllers\yantek;

use App\Http\Controllers\Controller;
use App\Models\FasyankesCategory;
use App\Models\FasyankesClass;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view("yantek.account.index",[
            'menu' => 'account',
            'users' => User::with('fasyankes_category', 'fasyankes_class')->get(),
            'title' => 'Manajemen Akun Fasyankes'
        ]);
    }

    public function detail($id){

    }

    public function create(){
        $categories = FasyankesCategory::orderBy('category_name')->get();
        $classes = FasyankesClass::orderBy('class_name')->get();
        
        return view('yantek.account.create',[
            'menu' => 'account',
            'title' => 'Tambah Akun Fasyankes',
            'categories' => $categories,
            'classes' => $classes
        ]);
    }

    public function store(Request $request){
        try{
            User::create([
                'fasyankes_name' => $request->fasyankes_name,
                'type' => $request->type,
                'province' => explode('.',$request->province)[1],
                'city' => $request->city,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'fasyankes_category_id' => $request->category,
                'fasyankes_class_id' => $request->class
            ]);

            return redirect(route('yantek.account.index'))->with('success', 'Menambahkan Akun Fasyankes Sukses');
        }catch(Exception $e){
            return redirect(route('yantek.account.create'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }

    public function edit(Request $request){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){
        
    }
}
