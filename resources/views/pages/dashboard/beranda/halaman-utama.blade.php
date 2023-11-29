@extends('layouts.dashboard.halaman-layout')

@section('konten')

<div>
    <div class="row g-3 pb-4">
        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
            <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                    <h2 class="mb-1" data-toggle="counter-up">{{ $total_produk }}</h2>
                    <p class="mb-0">Produk</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
            <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                    <h2 class="mb-1" data-toggle="counter-up">{{ $total_pemesanan }}</h2>
                    <p class="mb-0">Pemesanan</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
            <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                    <h2 class="mb-1" data-toggle="counter-up">{{ $total_customer }}</h2>
                    <p class="mb-0">Customer</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
            <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                    <p class="mb-0">Categories</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection