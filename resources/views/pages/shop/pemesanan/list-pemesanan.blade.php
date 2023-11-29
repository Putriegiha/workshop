@extends('layouts.shop.halaman-layout')


@section('konten')
    <div class="container">
        <h1>My Orders</h1>

        @if ($pemesanan->isEmpty())
            <p>You don't have any orders yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanan as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->tanggal_pemesanan->format('Y-m-d H:i:s') }}</td>
                            <td>${{ $order->totalTagihan() }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('pemesanan.show', $order->id) }}">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
