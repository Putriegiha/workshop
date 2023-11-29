@extends('layouts.dashboard.halaman-layout')

@section('konten')
<div class="flex items-center justify-between mb-8">
    <h1>List Barang</h1>
    <a href="{{ route('dashboard.produk.formTambah') }}" class="btn btn-primary">Tambah</a>
</div>

<table class="table">
    <thead>
        <th class="col">#</th>
        <th class="col">Nama Produk</th>
        <th class="col">Deskripsi Produk</th>
        <th class="col">Harga Produk</th>
        <th class="col">Gambar Produk</th>
        <th class="col">Status</th>
        <th class="col">Aksi</th>
    </thead>
    <tbody>
        @foreach ($semua_produk as $produk)
        <tr>
            <td scope="row">{{ $produk->id }}</td>
            <td class="col">{{ $produk->nama }}</td>
            <td class="col">{{ $produk->deskripsi }}</td>
            <td class="col">{{ $produk->harga }}</td>
            <td class="col">
                <img src="{{$produk->gambar_url}}" style="max-width: 50px" alt="gambar">
            </td>
            <td class="col">
                @if ($produk->deleted_at)
                <form action="{{route('dashboard.produk.memulihkan', ['produk' => $produk])}}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">
                        <x-bi-toggle-off />
                    </button>
                </form>
                @endif

                @if (is_null($produk->deleted_at))
                <form action="{{route('dashboard.produk.hapus', ['produk'=> $produk])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success btn-sm" type="submit">
                        <x-bi-toggle-on />
                    </button>
                </form>
                @endif
            </td>

            <td class="col">
                <form action="{{route('dashboard.produk.form-edit', ['produk' => $produk])}}">
                    @csrf
                    <button type="submit" class="btn btn-info btn-sm">
                        <x-bi-pen class="icon" />
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
</table>
@endsection