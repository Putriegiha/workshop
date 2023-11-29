@extends('layouts.dashboard.page-layout')

@section('konten')
    <h1>Edit Pemesanan</h1>

    <form method="post" action="{{ route('dashboard.pemesanan.form-edit', $pemesanan) }}">
        @csrf
        @method('put')

        <div>
            <label for="status_pemesanan">Status Pemesanan:</label>
            <select name="status_pemesanan" id="status_pemesanan">
                <option value="Diterima" {{ $pemesanan->status_pemesanan === 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ $pemesanan->status_pemesanan === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>

@endsection