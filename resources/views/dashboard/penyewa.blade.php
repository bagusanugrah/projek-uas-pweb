<div class="container">
    <!-- Awal Card Tabel -->
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Daftar Motor
        </div>
        <div class="card-body">
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