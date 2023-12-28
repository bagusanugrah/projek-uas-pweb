<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request){
        if($request->session()->has('loggedin_role')){
            if($request->session()->get('loggedin_role') == 'pemilik'){
                if($request->session()->has('motor')){
                    $request->session()->forget('motor');
                }
                $id_pemilik = $request->session()->get('loggedin_user');
                $motors = Motor::where('id_pemilik', $id_pemilik)->get();
                // dd($motors);
                return view('dashboard', compact('motors'))->with('title', 'Dashboard Pemilik');
            } else{
                return view('dashboard')->with('title', 'Dashboard Penyewa');
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
