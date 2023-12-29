@include('parts.header')
<div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <!-- Awal Card Form -->
        <div class="card mt-3 mb-3">
        <div class="card-header bg-dark text-white">
          Login
        </div>
        <div class="card-body">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                {{$error}}
              </div>
            @endforeach
          @endif
          <form method="post" action="{{route('login.post')}}">
            @csrf
            <div class="form-group">
              <label>Login Sebagai</label>
              <select name="role" class="form-select" aria-label="Default select example" required>
                <option value="">-- Pilih Salah Satu --</option>
                <!-- <option value="admin">Admin</option> -->
                <option value="pemilik">Pemilik Motor</option>
                <option value="penyewa">Penyewa Motor</option>
              </select>
            </div><br>
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" name="username" value="{{old('username')}}" class="form-control" required>
            </div><br>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" value="" class="form-control" required>
            </div><br>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <a href="{{route('registration.get')}}" class="btn btn-secondary">Daftar</a>
  
          </form>
        </div>
        </div>
        <!-- Akhir Card Form -->
      </div>
    </div>
</div>
@if (session()->has('sukses'))
  {!! session()->get('sukses') !!}
@endif
@include('parts.footer')