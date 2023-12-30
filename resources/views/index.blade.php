<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | Anugrah Rental Motor</title>
    <link href="{{asset('css/bootstrap5.css')}}" rel="stylesheet">
    <style>
        body {
            background: url('{{asset('src/kucing-naik-motor.png')}}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .overlay-card {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust the alpha value for transparency */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 mx-auto overlay-card">
            <h2 class="mb-4">Anugrah Rental Motor</h2>
            <p class="mb-4">Rasakan mudahnya rental motor. Klik tombol di bawah ini untuk daftar sebagai pemilik motor atau sebagai penyewa.</p>
            <a href="{{route('registration.get')}}" class="btn btn-primary">Daftar sekarang!</a>
        </div>
    </div>
</div>

<script src="{{asset('js/bootstrap5.js')}}"></script>
</body>
</html>
