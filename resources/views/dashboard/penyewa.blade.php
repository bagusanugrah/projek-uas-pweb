<div class="container">
    <!-- Awal Card Tabel -->
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Daftar Motor
        </div>
        <div class="card-body scrollable-table">
            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>No.</th>
                    <th>Merek Motor</th>
                    <th>Tipe Motor</th>
                    <th>Plat Nomor</th>
                    <th>Biaya Sewa Perhari</th>
                    <th>Nama Pemilik</th>
                    <th>No. HP Pemilik</th>
                    <th>Aksi</th>
                </tr>
                @foreach($motors as $motor)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$motor->merek}}</td>
                    <td>{{$motor->tipe}}</td>
                    <td>{{$motor->plat_nomor}}</td>
                    <td>{{$motor->sewa_perhari}}</td>
                    <td>{{$motor->pemilik->nama}}</td>
                    <td>{{$motor->pemilik->no_hp}}</td>
                    <td>
                        @if ($motor->isNotAvailableForRent())
                        
                        @else
                        <form style="display:inline;" action="{{route('motor.rent')}}" method="POST">
                            @csrf
                            <input type="text" name="plat" value="{{$motor->plat_nomor}}" hidden>
                            <input type="text" name="merek" value="{{$motor->merek}}" hidden>
                            <input type="text" name="tipe" value="{{$motor->tipe}}" hidden>
                            <input type="text" name="sewa_perhari" value="{{$motor->sewa_perhari}}" hidden>
                            <input type="text" name="id_pemilik" value="{{$motor->pemilik->username}}" hidden>
                            <button class="btn btn-primary"> Sewa </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- Akhir Card Tabel -->
</div>

<div class="container">
    <!-- Awal Card Tabel -->
    <div class="card mt-3 mb-3">
        <div class="card-header bg-dark text-white">
            History Transaksi Rental
        </div>
        <div class="card-body scrollable-table">
            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>No.</th>
                    <th>Motor</th>
                    <th>Pemilik</th>
                    <th>Tanggal Penyewaan</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Biaya</th>
                </tr>
                @foreach($penyewaans as $penyewaan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$penyewaan->plat_nomor}}<br>{{$penyewaan->merek_motor}}<br>{{$penyewaan->tipe_motor}}<br>Rp{{$penyewaan->sewa_perhari}}/hari</td>
                    <td>{{$penyewaan->nama}}<br>{{$penyewaan->no_hp}}</td>
                    <td>{{$penyewaan->tgl_penyewaan}}</td>
                    <td>
                        @if ($penyewaan->tgl_pengembalian=='')
                            -
                        @else
                            {{$penyewaan->tgl_pengembalian}}
                        @endif
                    </td>
                    <td>
                        @if ($penyewaan->tgl_pengembalian=='')
                            -
                        @else
                            @php
                                $tgl_penyewaan = $penyewaan->tgl_penyewaan;
                                $tgl_pengembalian = $penyewaan->tgl_pengembalian;
                                $sewa_perhari = $penyewaan->sewa_perhari;
                                $jumlah_hari = round((strtotime($tgl_pengembalian) - strtotime($tgl_penyewaan)) / (60 * 60 * 24));
                                if($jumlah_hari == 0){
                                    $jumlah_hari = 1;
                                }
                                $biaya = $jumlah_hari * $sewa_perhari;
                            @endphp
                            Rp{{$biaya}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
    <!-- Akhir Card Tabel -->
</div>