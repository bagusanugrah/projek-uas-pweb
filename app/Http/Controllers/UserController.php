<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfilePage(Request $request){
        if($request->session()->has('loggedin_user')){
            $role = $request->session()->get('loggedin_role');
            $username = $request->session()->get('loggedin_user');
            $getUser = ($role == 'pemilik') ? Pemilik::where('username', $username) : Penyewa::where('username', $username);
            $user = $getUser->firstOrFail();

            return view('profile')->with('title', 'Profil Saya')->with('user', $user);
        } else{
            return redirect()->route('dashboard.get');
        }
    }

    public function updateProfile(Request $request){
        $role = $request->session()->get('loggedin_role');
        $nik = $request->nik;
        $nama = $request->nama;
        $nohp = $request->nohp;
        $username = $request->session()->get('loggedin_user');
        $password = $request->password;
        
        $request->validate([
            'nik' => 'required|min:16|max:16|regex:/^[a-zA-Z0-9_.]*$/',
            'nama' => 'required|max:20|regex:/^[A-Z][a-z]*(?:\s[A-Z][a-z]*)*$/',
            'nohp' => 'required|max:13|regex:/^[0-9]+$/',
            'password' => 'max:255|confirmed',
        ], [
            'nik.required' => 'NIK wajib diisi!',
            'nik.min' => 'NIK harus terdiri dari 16 angka!',
            'nik.max' => 'NIK harus terdiri dari 16 angka!',
            'nik.regex' => 'NIK hanya boleh terdiri dari angka dan tidak boleh diawali angka 0!',
            'nama.required' => 'Nama wajib diisi!',
            'nama.max' => 'Nama hanya boleh terdiri dari maksimal 20 karakter!',
            'nama.regex' => 'Nama hanya boleh terdiri dari huruf, diawali huruf kapital, dan dipisahkan hanya dengan satu spasi!',
            'nohp.required' => 'No. HP wajib diisi!',
            'nohp.max' => 'No. HP hanya boleh terdiri dari maksimal 13 angka!',
            'nohp.regex' => 'No. HP hanya boleh terdiri dari angka!',
            'password.max' => 'Password hanya boleh terdiri dari maksimal 255 karakter!',
            'password.confirmed' => 'Password dan Konfirmasi Password harus sama!'
        ]);

        $getUser = ($role == 'pemilik') ? Pemilik::where('username', $username) : Penyewa::where('username', $username);
        $user = $getUser->first();

        if($password){
            $user->update([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp,
                'password' => $password
            ]);
        } else{
            $user->update([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp
            ]);
        }

        $request->session()->flash('sukses', "<script>alert('Update profil berhasil.');</script>");
        return redirect()->route('dashboard.get');
    }
}
