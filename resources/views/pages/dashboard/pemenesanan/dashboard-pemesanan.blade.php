@extends('layouts.dashboard.halaman-layout')

@section('konten')
<h1>Daftar Pemesanan</h1>

<table class="table">
    <thead>
        <th class="col">#</th>
        <th class="col">Invoice Number</th>
        <th class="col">Status Pemesanan</th>
        <th class="col">Tanggal Pemesanan</th>
        <th class="col">Tanggal Diperbarui</th>
        <th class="col">Actions</th>
    </thead>
    <tbody>
        @foreach ($semua_pemesanan as $pemesanan)
        <tr>
            <td scope="row">{{ $pemesanan->id }}</td>
            <td class="col">{{ $pemesanan->invoice_number }}</td>
            <td class="col">{{ $pemesanan->status_pemesanan }}</td>
            <td class="col">{{ $pemesanan->tanggal_pemesanan }}</td>
            <td class="col">{{ $pemesanan->tanggal_diperbarui }}</td>
            <td class="col">
                <a href="{{ route('dashboard.pemesanan.detail', ['pemesanan' => $pemesanan]) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection