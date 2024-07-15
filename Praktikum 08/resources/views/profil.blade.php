@php
    $username = 'Risca Marcella Jhesica';
    $role = 'Admin';
@endphp
@if ($role == 'Admin')
    <h3>Selamat datang, {{ $username }}! Anda adalah seorang {{ $role }}</h3>
@else
    <h3>Selamat datang, {{ $username }}! Anda adalah seorang User</h3>
@endif
