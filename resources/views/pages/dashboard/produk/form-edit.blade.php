@extends('layouts.dashboard.halaman-layout')

@section('konten')
<div class="wrapper-content">
  <h1>Edit {{$produk->nama}}</h1>

  <form action="{{ route('dashboard.produk.edit', ['produk' => $produk]) }}" method="POST">
    @method('PUT')
    <div class="card p-4">
      @csrf
      <div class="">
        <x-form-input class="mb-3" label="Nama" name="nama" value="{{$produk->nama}}" />
        <x-form-input class="mb-3" label="Deskripsi" type="textarea" name="deskripsi" value="{{$produk->deskripsi}}" />
        <x-form-input class="mb-3" label="Harga" type="number" name="harga" value="{{$produk->harga}}" />
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