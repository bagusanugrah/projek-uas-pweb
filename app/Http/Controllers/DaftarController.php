<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function show(){
        return view('daftar');
    }

    public function post(Request $request){
        $role = $request->role;
        $nik = $request->nik;
        $nama = $request->nama;
        $nohp = $request->nohp;
        $username = $request->username;
        $password = $request->password;
        
        if($role == 'pemilik'){
            $request->validate([
                'role' => 'required',
                'nik' => 'required|min:16|max:16|regex:/^[a-zA-Z0-9_.]*$/',
                'nama' => 'required|max:20|regex:/^[A-Z][a-z]*(?:\s[A-Z][a-z]*)*$/',
                'nohp' => 'required|max:13|regex:/^[0-9]+$/',
                'username' => 'required|max:20|regex:/^[a-zA-Z0-9_.]*$/|unique:pemilik',
                'password' => 'required|max:255',
            ], [
                'role.required' => 'Pilih daftar sebagai apa!',
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
                'username.required' => 'Username wajib diisi!',
                'username.max' => 'Username hanya boleh terdiri dari maksimal 20 karakter!',
                'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, underscore, dan titik!',
                'username.unique' => 'Username sudah terdaftar!',
                'password.required' => 'Password wajib diisi!',
                'password.max' => 'Password hanya boleh terdiri dari maksimal 255 karakter!',
                'password.confirmed' => 'Password dan Konfirmasi Password harus sama!'
            ]);

            Pemilik::create([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp,
                'username' => $username,
                'password' => $password
            ]);

            $request->session()->flash('sukses', "<script>alert('Pendaftaran berhasil.');</script>");
            return redirect()->route('login.get');
        } else {
            $request->validate([
                'role' => 'required',
                'nik' => 'required|min:16|max:16|regex:/^[a-zA-Z0-9_.]*$/',
                'nama' => 'required|max:20|regex:/^[A-Z][a-z]*(?:\s[A-Z][a-z]*)*$/',
                'nohp' => 'required|max:13|regex:/^[0-9]+$/',
                'username' => 'required|max:20|regex:/^[a-zA-Z0-9_.]*$/|unique:penyewa',
                'password' => 'required|max:255|confirmed',
            ], [
                'role.required' => 'Pilih daftar sebagai apa!',
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
                'username.required' => 'Username wajib diisi!',
                'username.max' => 'Username hanya boleh terdiri dari maksimal 20 karakter!',
                'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, underscore, dan titik!',
                'username.unique' => 'Username sudah terdaftar!',
                'password.required' => 'Password wajib diisi!',
                'password.max' => 'Password hanya boleh terdiri dari maksimal 255 karakter!',
                'password.confirmed' => 'Password dan Konfirmasi Password harus sama!'
            ]);

            Penyewa::create([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp,
                'username' => $username,
                'password' => $password
            ]);

            $request->session()->flash('sukses', "<script>alert('Pendaftaran berhasil.');</script>");
            return redirect()->route('login.get');
        }
    }
}
