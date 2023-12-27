@include('parts.header')
<div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <div class="text-left mb-3 mt-3">
          <a href="{{route('login.get')}}" class="btn btn-secondary">< Login</a>
        </div>
        <!-- Awal Card Form -->
        <div class="card mt-3 mb-3">
        <div class="card-header bg-dark text-white">
          Pendaftaran
        </div>
        <div class="card-body">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                {{$error}}
              </div>
            @endforeach
          @endif
          <form method="post" action="{{route('daftar.post')}}">
            @csrf
            <div class="form-group">
              <label>Daftar Sebagai</label>
              <select name="role" class="form-select" aria-label="Default select example">
                <option value="">-- Pilih Salah Satu --</option>
                <option value="pemilik">Pemilik Motor</option>
                <option value="penyewa">Penyewa Motor</option>
              </select>
            </div><br>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input id="nik" type="text" name="nik" value="{{old('nik')}}" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input id="nama" type="text" name="nama" value="{{old('nama')}}" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="nohp">No. HP</label>
              <input id="nohp" type="text" name="nohp" value="{{old('nohp')}}" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" value="{{old('username')}}" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" value="" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input id="password_confirmation" type="password" name="password_confirmation" value="" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
            <button type="reset" class="btn btn-danger" name="reset">Reset</button>

          </form>
        </div>
        </div>
        <!-- Akhir Card Form -->
      </div>
    </div>
</div>
@include('parts.footer')