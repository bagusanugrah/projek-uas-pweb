<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function showRegistrationPage(){
        return view('registration')->with('title', 'Pendaftaran');
    }

    public function postRegistration(Request $request){
        $role = ($request->role == 'pemilik') ? 'pemilik' : 'penyewa';
        $nik = $request->nik;
        $nama = $request->nama;
        $nohp = $request->nohp;
        $username = $request->username;
        $password = $request->password;
        
        $request->validate([
            'role' => 'required',
            'nik' => 'required|min:16|max:16|regex:/^[1-9]\d*$/',
            'nama' => 'required|max:20|regex:/^[A-Z][a-z]*(?:\s[A-Z][a-z]*)*$/',
            'nohp' => 'required|max:13|regex:/^[0-9]+$/',
            'username' => "required|max:20|regex:/^[a-zA-Z0-9_.]*$/|unique:$role",
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

        if($role == 'pemilik'){
            Pemilik::create([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp,
                'username' => $username,
                'password' => $password
            ]);
        } else{
            Penyewa::create([
                'nik' => $nik,
                'nama' => $nama,
                'no_hp' => $nohp,
                'username' => $username,
                'password' => $password
            ]);
        }

        $request->session()->flash('sukses', "<script>alert('Pendaftaran berhasil.');</script>");
        return redirect()->route('login.get');
    }

    public function showLoginPage(Request $request){
        if($request->session()->has('loggedin_role')){
            return redirect()->route('dashboard.get');
        } else {
            return view('login')->with('title', 'Login');
        }
    }

    public function postLogin(Request $request){
        $role = $request->role;
        $username = $request->username;
        $password = $request->password;

        try {
            $request->validate([
                'role' => 'required',
                'username' => "required|exists:{$role},username",
                'password' => 'required',
            ], [
                'role.required' => 'Pilih login sebagai apa!',
                'username.required' => 'Username wajib diisi!',
                'username.exists' => 'Username belum terdaftar!',
                'password.required' => 'Password wajib diisi!'
            ]);

            $getUser = ($role == 'pemilik') ? Pemilik::where('username', $username) : Penyewa::where('username', $username);
            $user = $getUser->first();

            if ($user && $password == $user->password) {
                $request->session()->put('loggedin_role', $role);
                $request->session()->put('loggedin_user', $username);

                return redirect()->route('dashboard.get');
            } else {
                // Throw a validation exception for incorrect password
                throw ValidationException::withMessages(['password' => ['Password salah!']]);
            }
        } catch (ValidationException $e) {
            // Handle the validation exception (e.g., redirect back with errors)
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

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
            'nik' => 'required|min:16|max:16|regex:/^[1-9]\d*$/',
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
