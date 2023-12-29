@include('parts.header')
<div class="container">
  <div class="text-left mb-3 mt-3">
    <a href="{{route('profile.show')}}" class="btn btn-light">Lihat Profil Saya</a>
  </div>
</div>
@if (session()->get('loggedin_role') == 'pemilik')
    @include('dashboard.pemilik')
@else
    @include('dashboard.penyewa')
@endif
@if (session()->has('sukses'))
  {!! session()->get('sukses') !!}
@endif
@include('parts.footer')