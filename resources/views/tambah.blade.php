@include('parts.header')
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="text-left mb-3 mt-3">
                <a href="{{route('dashboard.get')}}" class="btn btn-secondary">< Kembali ke Dashboard</a>
            </div>
            <!-- Awal Card Form -->
            <div class="card mt-3 mb-3">
            <div class="card-header bg-dark text-white">
                Rantalkan Motor Anda
            </div>
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach
                @endif
                <form method="post" action="{{route('motor.post')}}">
                    @csrf
                    <input type="hidden" name="iduser" value="{{session()->get('loggedin_user')}}">
                    <div class="form-group">
                        <label for="plat">Plat Nomor Motor</label>
                        <input id="plat" type="text" name="plat" value="{{old('plat')}}" class="form-control" required>
                    </div><br>
                    <div class="form-group">
                        <label for="merek">Merek Motor</label>
                        <input id="merek" type="text" name="merek" value="{{old('merek')}}" class="form-control" required>
                    </div><br>
                    <div class="form-group">
                        <label for="tipe">Tipe Motor</label>
                        <input id="tipe" type="text" name="tipe" value="{{old('tipe')}}" class="form-control" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-text" id="mata-uang">Rp</span>
                        <input id="biaya" placeholder="Biaya Sewa Perhari" type="number" name="biaya" value="{{old('biaya')}}" class="form-control" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="rentalkan">Rentalkan</button>
                    <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                </form>
            </div>
            </div>
            <!-- Akhir Card Form -->
        </div>
    </div>
</div>
@include('parts.footer')