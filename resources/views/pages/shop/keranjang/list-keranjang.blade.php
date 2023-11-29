@extends('layouts.shop.halaman-layout')


@section('konten')
    <div class="container">
        <h1>Keranjang</h1>

        @if ($keranjangItems->isEmpty())
            <p>Your shopping cart is empty.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjangItems as $item)
                        <tr>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>
                                <form action="{{ route('shop.keranjang.form-edit', $item->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="number" name="qty" value="{{ $item->qty }}" min="1">
                                    <button type="submit">Edit</button>
                                </form>
                                <form action="{{ route('shop.keranjang.hapus', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
