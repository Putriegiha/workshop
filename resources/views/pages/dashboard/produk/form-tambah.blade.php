@extends('layouts.dashboard.halaman-layout')

@section('konten')
<div class="wrapper-content">
    <h1>Buat Produk</h1>

    <form action="{{ route('dashboard.produk.tambah') }}" method="POST" enctype="multipart/form-data">
        <div class="card p-4">
            @csrf
            <div>
                <x-form-input class="mb-3" label="Nama" name="nama" />
                <x-form-input class="mb-3" label="Deskripsi" name="deskripsi" type="textarea" />
                <x-form-input class="mb-3" label="Harga" name="harga" />
                <x-form-input class="mb-3" type="image" label="Gambar Produk" name="gambar" />
            </div>


            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary block">Simpan</button>
                <button class="btn btn-info" onclick="cancel()" type="button">Batal</button>
            </div>

            <script>
                function cancel() {
                    window.location.href = "{{route('dashboard.produk.list')}}"
                }
            </script>
        </div>
    </form>
</div>
@endsection