<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class GeneralRoutesController extends Controller
{
    public function home(){
        if(Auth::guard('web')->check()){
            return redirect(route('fasyankes.home'));
        }else if(Auth::guard('admin')->check()){
            $role = Auth::guard('admin')->user()->role;
            if($role == "YANTEK"){
                return redirect(route('yantek.home.index'));
            }else if($role == 'PENYELIA'){
                return redirect(route('penyelia.home.index'));
            }else if($role == 'PETUGAS'){
                return redirect(route('petugas.home.index'));
            }else if($role == 'BENDAHARA'){
                return redirect(route('bendahara.home.index'));
            }
        }

        return redirect(route('login.index'));
    }

    public function internalOrder(){
        if(Auth::guard('web')->check()){
            return redirect(route('fasyankes.order.internal.index'));
        }else if(Auth::guard('admin')->check()){
            $role = Auth::guard('admin')->user()->role;
            if($role == "YANTEK"){
                return redirect(route('yantek.order.internal.index'));
            }else if($role == "PENYELIA"){
                return redirect(route('penyelia.order.internal.index'));
            }
        }

        return redirect(route('/home-redirect'));
    }

    public function externalOrder(){
        if(Auth::guard('web')->check()){
            return redirect(route('fasyankes.order.external.index'));
        }else if(Auth::guard('admin')->check()){
            $role = Auth::guard('admin')->user()->role;
            if($role == "YANTEK"){
                return redirect(route('yantek.order.external.index'));
            }else if($role == 'PENYELIA'){
                return redirect(route('penyelia.order.external.index'));
            }else if($role == 'PETUGAS'){
                return redirect(route('petugas.order.external.worksheet.index'));
            }else if($role == "BENDAHARA"){
                return redirect(route('bendahara.order.external.index'));
            }
        }

        return redirect(route('/home-redirect'));
    }
}
