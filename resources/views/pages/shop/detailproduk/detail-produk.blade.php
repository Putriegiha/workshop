@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container">
        <h1>Detail Produk</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ $produk->gambar_url }}" alt="{{ $produk->nama }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><strong>Nama Produk:</strong> {{ $produk->nama }}</p>
                <p><strong>Harga:</strong> Rp.{{ $produk->harga }}</p>
                <p><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>
                <!-- Add more details as needed -->

                <!-- If you want to display information from PemesananDetail model -->
                @if ($produk->pemesananDetail)
                    <p><strong>Qty Terjual:</strong> {{ $produk->pemesananDetail->qty }}</p>
                    <p><strong>Total Harga Terjual:</strong> ${{ $produk->pemesananDetail->harga_produk }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection

