<div class="container">
    <!-- Awal Card Tabel -->
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Motor yang direntalkan
        </div>
        <div class="card-body scrollable-table">
            <div class="text-left mb-3">
                <a href="{{route('motor.add')}}" class="btn btn-success">+ Rentalkan Motor</a>
            </div>
            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>No.</th>
                    <th>Merek Motor</th>
                    <th>Tipe Motor</th>
                    <th>Plat Nomor</th>
                    <th>Biaya Sewa Perhari</th>
                    <th>Aksi</th>
                </tr>
                @foreach($motors as $motor)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$motor->merek}}</td>
                    <td>{{$motor->tipe}}</td>
                    <td>{{$motor->plat_nomor}}</td>
                    <td>{{$motor->sewa_perhari}}</td>
                    <td>
                        <form style="display:inline;" action="{{route('motor.edit')}}" method="POST">
                            @csrf
                            <input type="text" name="plat" value="{{$motor->plat_nomor}}" hidden>
                            <button class="btn btn-warning"> Edit </button>
                        </form>
                        <form style="display:inline;" action="{{route('motor.delete')}}" method="POST">
                            @csrf
                            <input type="text" name="plat" value="{{$motor->plat_nomor}}" hidden>
                            <button class="btn btn-danger"> Hapus </button>
                        </form>
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
                    <th>Penyewa</th>
                    <th>Tgl Penyewaan</th>
                    <th>Tgl Pengembalian</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </tr>
                @foreach($penyewaans as $penyewaan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$penyewaan->plat_nomor}}<br>{{$penyewaan->merek_motor}}<br>{{$penyewaan->tipe_motor}}<br>Rp{{$penyewaan->sewa_perhari}}/hari</td>
                    <td>{{$penyewaan->nik}}<br>{{$penyewaan->nama}}<br>{{$penyewaan->no_hp}}</td>
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
                    <td>
                        @if ($penyewaan->tgl_pengembalian=='')
                        <form style="display:inline;" action="{{route('motor.return')}}" method="POST">
                            @csrf
                            <input type="text" name="tgl_penyewaan" value="{{$penyewaan->tgl_penyewaan}}" hidden>
                            <input type="text" name="plat" value="{{$penyewaan->plat_nomor}}" hidden>
                            <input type="text" name="id_penyewaan" value="{{$penyewaan->id_penyewaan}}" hidden>
                            <button class="btn btn-primary"> Kembalikan </button>
                        </form>
                        @else
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
    <!-- Akhir Card Tabel -->
</div>