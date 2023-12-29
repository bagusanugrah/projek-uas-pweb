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
          Profil Saya
        </div>
        <div class="card-body">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                {{$error}}
              </div>
            @endforeach
          @endif
          <form method="post" action="{{route('profile.update')}}">
            @csrf
            <div class="form-group">
              <label for="nik">NIK</label>
              <input id="nik" type="text" name="nik" value="{{old('nik', $user->nik)}}" class="form-control" required>
            </div><br>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input id="nama" type="text" name="nama" value="{{old('nama', $user->nama)}}" class="form-control" required>
            </div><br>
            <div class="form-group">
              <label for="nohp">No. HP</label>
              <input id="nohp" type="text" name="nohp" value="{{old('nohp', $user->no_hp)}}" class="form-control" required>
            </div><br>
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" value="{{$user->username}}" class="form-control" disabled>
            </div><br>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" value="" class="form-control">
            </div><br>
            <div class="form-group">
              <label for="password_confirmation">Konfirmasi Password</label>
              <input id="password_confirmation" type="password" name="password_confirmation" value="" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-primary" name="update">Update Profil</button>
          </form>
        </div>
        </div>
        <!-- Akhir Card Form -->
      </div>
    </div>
</div>
@include('parts.footer')