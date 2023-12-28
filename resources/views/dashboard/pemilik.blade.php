<div class="container">
    <!-- Awal Card Tabel -->
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Motor yang direntalkan
        </div>
        <div class="card-body">
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