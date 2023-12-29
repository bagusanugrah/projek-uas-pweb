<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function rentAMotor(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $tgl_penyewaan = date("Y-m-d");
        $plat_nomor = $request->plat;
        $merek = $request->merek;
        $tipe = $request->tipe;
        $sewa_perhari = $request->sewa_perhari;
        $id_pemilik = $request->id_pemilik;
        $id_penyewa = $request->session()->get('loggedin_user');

        Penyewaan::create([
            'tgl_penyewaan' => $tgl_penyewaan,
            'plat_nomor' => $plat_nomor,
            'merek_motor' => $merek,
            'tipe_motor' => $tipe,
            'sewa_perhari' => $sewa_perhari,
            'id_pemilik' => $id_pemilik,
            'id_penyewa' => $id_penyewa
        ]);

        $request->session()->flash('sukses', "<script>alert('Motor berhasil disewa.');</script>");
        return redirect()->route('dashboard.get');
    }

    public function returnAMotor(Request $request){
        date_default_timezone_set("Asia/Jakarta");
        $tgl_penyewaan = $request->tgl_penyewaan;
        $tgl_pengembalian = date("Y-m-d");
        $plat_nomor = $request->plat;
        $id_penyewaan = $request->id_penyewaan;

        $penyewaan = Penyewaan::where('id_penyewaan', $id_penyewaan)->first();
        $penyewaan->update([
            'tgl_pengembalian' => $tgl_pengembalian
        ]);

        Pengembalian::create([
            'tgl_penyewaan' => $tgl_penyewaan,
            'tgl_pengembalian' => $tgl_pengembalian,
            'plat_nomor' => $plat_nomor,
            'id_penyewaan' => $id_penyewaan
        ]);

        $request->session()->flash('sukses', "<script>alert('Motor berhasil dikembalikan.');</script>");
        return redirect()->route('dashboard.get');
    }
}
