@include('parts.header')
@if (session()->get('loggedin_role') == 'pemilik')
    @include('dashboard.pemilik')
@else
    @include('dashboard.penyewa')
@endif
@include('parts.footer')