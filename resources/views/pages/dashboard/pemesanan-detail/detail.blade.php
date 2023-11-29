@extends('layouts.dashboard.halaman-layout')

@section('konten')

<div class="flex items-center justify-between mb-8">
    <h1>Detail Pesanan {{$pemesanan->invoice_number}}</h1>
</div>

<div>Buat card pengguna</div>
<div>Buat table produk yang dibeli</div>
<div>Buat buat table pembayaran</div>
@endsection