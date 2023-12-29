<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboardPage(Request $request){
        if($request->session()->has('loggedin_role')){
            if($request->session()->get('loggedin_role') == 'pemilik'){
                if($request->session()->has('motor')){
                    $request->session()->forget('motor');
                }
                $id_pemilik = $request->session()->get('loggedin_user');
                $motors = Motor::where('id_pemilik', $id_pemilik)->get();
                $penyewaans = Penyewaan::select('penyewaan.*', 'penyewa.*')
                ->join('penyewa', 'penyewaan.id_penyewa', '=', 'penyewa.username')
                ->where('penyewaan.id_pemilik', '=', $id_pemilik)
                ->get();
                // dd($penyewaans);
                return view('dashboard', compact('motors', 'penyewaans'))->with('title', 'Dashboard Pemilik');
            } else{
                $id_penyewa = $request->session()->get('loggedin_user');
                $motors = Motor::select('motor.*', 'pemilik.*')
                ->join('pemilik', 'motor.id_pemilik', '=', 'pemilik.username')
                ->get();
                $penyewaans = Penyewaan::select('penyewaan.*', 'pemilik.*')
                ->join('pemilik', 'penyewaan.id_pemilik', '=', 'pemilik.username')
                ->where('penyewaan.id_penyewa', '=', $id_penyewa)
                ->get();
                // dd($penyewaans);
                return view('dashboard', compact('motors', 'penyewaans'))->with('title', 'Dashboard Penyewa');
            }
        } else {
            return redirect()->route('login.get');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('loggedin_role');
        $request->session()->forget('loggedin_user');
        if($request->session()->has('motor')){
            $request->session()->forget('motor');
        }
        return redirect()->route('login.get');
    }
}
