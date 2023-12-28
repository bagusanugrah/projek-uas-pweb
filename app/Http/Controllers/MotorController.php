<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function add(Request $request){
        if($request->session()->has('loggedin_role') && $request->session()->get('loggedin_role') == 'pemilik'){
            return view('tambah')->with('title', 'Rentalkan Motor');
        } else {
            return redirect()->route('login.get');
        }
    }

    public function post(Request $request){
        $id_pemilik = $request->iduser;
        $plat_nomor = $request->plat;
        $merek = $request->merek;
        $tipe = $request->tipe;
        $sewa_perhari = $request->biaya;
        
        $request->validate([
            'plat' => 'required|regex:/^[a-zA-Z]{1,2} \d{1,4} [a-zA-Z]{1,3}$/|unique:motor,plat_nomor',
            'merek' => 'required|max:15|regex:/^[a-zA-Z]+$/',
            'tipe' => 'required|max:20|regex:/^[a-zA-Z0-9 ]+$/',
            'biaya' => 'required|regex:/^\d+$/'
        ], [
            'plat.required' => 'Plat nomor wajib diisi!',
            'plat.regex' => 'Masukkan plat nomor dengan format plat nomor indonesia!',
            'plat.unique' => 'Plat nomor sudah terdaftar!',
            'merek.required' => 'Merek wajib diisi!',
            'merek.max' => 'Merek hanya boleh terdiri dari maksimal 15 huruf!',
            'merek.regex' => 'Merek hanya boleh terdiri dari huruf!',
            'tipe.required' => 'Tipe wajib diisi!',
            'tipe.max' => 'Merek hanya boleh terdiri dari maksimal 20 huruf!',
            'tipe.regex' => 'Merek hanya boleh terdiri dari huruf, angka, dan spasi!',
            'biaya.required' => 'Biaya wajib diisi!',
            'biaya.regex' => 'Biaya hanya boleh terdiri dari bilangan bulat!'
        ]);

        Motor::create([
            'plat_nomor' => strtoupper($plat_nomor),
            'merek' => $merek,
            'tipe' => $tipe,
            'sewa_perhari' => $sewa_perhari,
            'id_pemilik' => $id_pemilik
        ]);

        $request->session()->flash('sukses', "<script>alert('Motor berhasil ditambahkan.');</script>");
        return redirect()->route('dashboard.get');
    }

    public function edit(Request $request){
        $plat_nomor = $request->plat;
        $motor = Motor::where('plat_nomor', $plat_nomor)->firstOrFail();
        if($motor){
            $request->session()->put('motor', $motor);
            return redirect()->route('motor.show');
        } else{
            return redirect()->route('dashboard.get');
        }
    }

    public function show(Request $request){
        if($request->session()->has('loggedin_role') && $request->session()->get('loggedin_role') == 'pemilik'){
            if($request->session()->has('motor')){
                $motor = $request->session()->get('motor');
                return view('edit')->with('title', 'Edit Motor')->with('motor', $motor);
            } else{
                return redirect()->route('dashboard.get');
            }
        } else {
            return redirect()->route('login.get');
        }
    }

    public function update(Request $request){
        $plat_nomor = $request->plat;
        $merek = $request->merek;
        $tipe = $request->tipe;
        $sewa_perhari = $request->biaya;
        
        $request->validate([
            'merek' => 'required|max:15|regex:/^[a-zA-Z]+$/',
            'tipe' => 'required|max:20|regex:/^[a-zA-Z0-9 ]+$/',
            'biaya' => 'required|regex:/^\d+$/'
        ], [
            'merek.required' => 'Merek wajib diisi!',
            'merek.max' => 'Merek hanya boleh terdiri dari maksimal 15 huruf!',
            'merek.regex' => 'Merek hanya boleh terdiri dari huruf!',
            'tipe.required' => 'Tipe wajib diisi!',
            'tipe.max' => 'Merek hanya boleh terdiri dari maksimal 20 huruf!',
            'tipe.regex' => 'Merek hanya boleh terdiri dari huruf, angka, dan spasi!',
            'biaya.required' => 'Biaya wajib diisi!',
            'biaya.regex' => 'Biaya hanya boleh terdiri dari bilangan bulat!'
        ]);

        $motor = Motor::where('plat_nomor', $plat_nomor)->first();

        $motor->update([
            'merek' => $merek,
            'tipe' => $tipe,
            'sewa_perhari' => $sewa_perhari
        ]);
        
        $request->session()->forget('motor');
        $request->session()->flash('sukses', "<script>alert('Motor berhasil diupdate.');</script>");
        return redirect()->route('dashboard.get');
    }

    public function delete(Request $request){
        $plat_nomor = $request->plat;

        $motor = Motor::where('plat_nomor', $plat_nomor)->first();
        $motor->delete();
        
        $request->session()->flash('sukses', "<script>alert('Motor berhasil dihapus.');</script>");
        return redirect()->route('dashboard.get');
    }
}
