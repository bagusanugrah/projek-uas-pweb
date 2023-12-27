<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(Request $request){
        if($request->session()->has('loggedin_role')){
            if($request->session()->get('loggedin_role') == 'pemilik'){
                return view('dashboard')->with('title', 'Dashboard Pemilik');
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
        return redirect()->route('login.get');
    }
}
