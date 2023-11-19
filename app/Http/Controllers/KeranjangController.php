<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class KeranjangController extends Controller
{
    public function keranjang()
    {
    return view('pages.shop.keranjang.keranjang');
    }

    public function create()
    {
        // Menampilkan formulir pembuatan pemesanan
        return view('pemesanans.create');
    }

    public function store(Request $request)
    {
        // Menyimpan pemesanan baru ke database
        $request->validate([
            'jumlah_produk_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required',
            'sub_total_pemesanan' => 'required',
            'id_kategori' => 'required',
            'id_pengguna' => 'required',
            'id_pembayaran' => 'required',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil dibuat.');
    }

    public function edit($id)
    {
        // Menampilkan formulir pengeditan pemesanan
        $pemesanan = Pemesanan::find($id);
        return view('pemesanans.edit', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        // Mengupdate pemesanan
        $request->validate([
            'jumlah_produk_pemesanan' => 'required',
            'tanggal_pemesanan' => 'required',
            'sub_total_pemesanan' => 'required',
            'id_kategori' => 'required',
            'id_pengguna' => 'required',
            'id_pembayaran' => 'required',
        ]);

        $pemesanan = Pemesanan::find($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Menghapus pemesanan
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();

        return redirect()->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil dihapus.');
    }
}


