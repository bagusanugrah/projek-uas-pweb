<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/daftar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body id="all">
    {{-- <div class="wrapper">
        <h1>SELAMAT DATANG DI BAGUS MOTOR</h1>
    </div> --}}
    <section class="wrapper-footer">
    <div class="card" style="width: 48rem; border-radius: 1rem;" id="background-card" >
      <div class="card-body">
          <h5 class="card-title text-center">🏍️Temukan Kebebasan Berkendara Bersama Kami!</h5>
          <p class="card-text">Siap untuk petualangan tanpa batas? Dengan rental motor kami, setiap perjalanan Anda menjadi lebih mudah dan menyenangkan. Temukan kebebasan berkendara tanpa ribet, hanya dengan satu klik!</p>
       
      </div>
    </div>
    </section>

    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="text-left mb-3 mt-3">
            <a href="login.php" class="btn btn-secondary">< Login</a>
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

{{-- <section class="vh-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-dark" style="border-radius: 1rem;" id="background-card">
          <div class="card-body p-5 text-center">
            <form action="/daftar" method="post">
            <div class="mb-md-5 mt-md-4">

              <h2 class="fw-bold mb-4 text-uppercase text-white">Daftar</h2>
              <div class="mb-5">
                <select name="role" class="form-select" aria-label="Default select example">
                  <option value="">-- Daftar Sebagai --</option>
                  <option value="pemilik">Pemilik Motor</option>
                  <option value="penyewa">Penyewa Motor</option>
                </select>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="nik" name="nik" class="form-control form-control-lg" />
                <label class="form-label text-white" for="nik">NIK</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="nama" name="nama" class="form-control form-control-lg" />
                <label class="form-label text-white" for="nama">Nama</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="nohp" name="nohp" class="form-control form-control-lg" />
                <label class="form-label text-white" for="nohp">No. HP</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="email" id="username" name="username" class="form-control form-control-lg" />
                <label class="form-label text-white" for="username">Username</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="password" class="form-control form-control-lg" />
                <label class="form-label text-white" for="password">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Daftar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}



<section class="wrapper-footer">
    {{-- <div class="card" style="width: 48rem; border-radius: 1rem;" id="background-card">
      <div class="card-body">
        <h5 class="card-title text-center">🌟Kenapa Memilih Rental Motor Kami?</h5>
        <p class="card-text">✅ Fasilitas Terbaik: Motor-motor kami selalu dalam kondisi prima dan siap melibas jalanan dengan performa maksimal.</p>
        <p class="card-text">✅ Harga Terjangkau: Nikmati petualangan tanpa harus menguras kantong. Harga sewa motor kami sangat bersaing dan cocok untuk semua budget.</p>
      </div>
    </div> --}}
</section>

</body>
</html>