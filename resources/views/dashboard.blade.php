@include('parts.header')
@if (session()->get('loggedin_role') == 'pemilik')
    @include('dashboard.pemilik')
@else
    @include('dashboard.penyewa')
@endif
@if (session()->has('sukses'))
  {!! session()->get('sukses') !!}
@endif
@include('parts.footer')