<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-dark" style="border-radius: 1rem;" id="background-card">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" />
                <label class="form-label text-white" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" />
                <label class="form-label text-white" for="typePasswordX">Password</label>
              </div>
              <select name="role" class="form-select" aria-label="Default select example" required>
								<option value="">-- Pilih Salah Satu --</option>
								<!-- <option value="admin">Admin</option> -->
								<option value="pemilik">Pemilik Motor</option>
								<option value="penyewa">Penyewa Motor</option>
							</select>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="wrapper-footer">
    <div class="card" style="width: 48rem; border-radius: 1rem;" id="background-card">
      <div class="card-body">
        <h5 class="card-title text-center">🌟Kenapa Memilih Rental Motor Kami?</h5>
        <p class="card-text">✅ Fasilitas Terbaik: Motor-motor kami selalu dalam kondisi prima dan siap melibas jalanan dengan performa maksimal.</p>
        <p class="card-text">✅ Harga Terjangkau: Nikmati petualangan tanpa harus menguras kantong. Harga sewa motor kami sangat bersaing dan cocok untuk semua budget.</p>
      </div>
    </div>
</section>

@if(session('sukses'))
  {!! session('sukses') !!}
@endif

</body>
</html>