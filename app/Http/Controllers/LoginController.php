<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show(Request $request){
        if($request->session()->has('loggedin_role')){
            return redirect()->route('dashboard.get');
        } else {
            return view('login')->with('title', 'Login');
        }
    }

    public function post(Request $request){
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
}
