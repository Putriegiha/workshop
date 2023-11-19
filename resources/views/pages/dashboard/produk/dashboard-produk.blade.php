@extends('layouts.dashboard.halaman-layout')

@section('konten')
    
    <div class="flex items-center justify-between mb-8">
        <h1>List Barang</h1>
        <a href="{{ route('dashboard.produk.formTambah') }}" class="btn btn-primary">Tambah</a>
    </div>

    <table class="table">
        <thead>
            <th class="w-px text-right whitespace-nowrap"> Nama Produk</th>
            <th class="text-left"> Deskripsi Produk</th>
            <th class="text-left"> Harga Produk</th>
            <th class="text-left"> Gambar Produk</th>
            <th class="text-left"> Merek Produk</th>
        </thead>
        <tbody>
        @foreach ($produks as $produks)
        <tr>
            <td class="w-px text-right whitespace-nowrap">{{ $produks->id_produk }}</td>
            <td class="text-left">{{ $produks->nama_produk }}</td>
            <td class="text-left">{{ $produks->harga_produk }}</td>
            <td class="text-left">{{ $produks->gambar_produk }}</td>
            <td class="text-left">{{ $produks->merek_produk }}</td>
           
            <td class="p-2 text-left">{{$produks->deleted_at ? 'Tidak Aktif' : 'Aktif'}}</td>
                    <td class="w-px whitespace-nowrap">
                    <div class="flex items-center space-x-2">
                    <a class="btn-icon btn-edit" href="{{ route('dashboard.produk.form-edit', ['id' => $produks->id_produk]) }}">
                        <x-far-edit class="icon" />
                    </a>

                     @if ($produks->deleted_at)
                    <form action="{{route('dashboard.produk.memulihkan', ['id' => $produks->id_produk])}}" method="POST">
                        @csrf
                        <button class="text-red-500" type="submit">
                            <x-bi-toggle-off />
                        </button>    
                    </form>
                    @endif
                    
                    @if (is_null($produks->deleted_at))
                        <form action="{{route('dashboard.produk.hapus', ['id'=>$produks->id_produk])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                            <x-bi-toggle-on />
                        </button>
                        </form>
                        @endif
                        </div>
                        </td>
        </tr>
        @endforeach
    </table>
@endsection

        
                 
                  
   