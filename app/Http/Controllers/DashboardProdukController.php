<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardProdukController extends Controller
{
    public function dashboardProduk()
    {
        $produks = DB::table('produks')
            ->get();

        return view('pages.dashboard.produk.dashboard-produk', [
            'produks' => $produks,
        ]);
    }

    public function formTambah()
    {
        $produks = DB::table('produks')->get()->map(function ($produks) {
            return [
                'label' => $produks->nama_produk,
                'value' => $produks->id_produk,
            ];
        })->toArray();

        return view('pages.dashboard.produk.form-tambah', ['produks' => $produks]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:600',
            'harga_produk' => 'required|float',
            'gambar_produk' => 'required|string',
            'merek_produk' => 'required|string|max:30',
            'tanggal_rilis_produk' => 'required|date',
        ]);

        DB::table('produks')->insert([
            'id_produk' => $validated['id_produk'],
            'nama_produk' => $validated['nama_produk'],
            'deskripsi_produk' => $validated['deskripsi_produk'],
            'harga_produk' => $validated['harga_produk'],
            'gambar_produk' =>  $validated['gambar_produk'],
            'merek_produk' =>  $validated['merek_produk'],
            'tanggal_rilis_produk' =>  $validated['tanggal_rilis_produk'],
        ]);

        return redirect()
            ->route('produk.dashboard-produk')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama']]);
    }

    public function formEdit(int $id)
    {
        $produks = DB::table('produks')->get()->map(function ($produks) {
            return [
                'label' => $produks->nama_produk,
                'value' => $produks->id_produk,
            ];
        })->toArray();
        return view('pages.dashboard.barang.form-edit', [
            'produks' => $produks,
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:100',
        ]);

        DB::table('produks')
            ->where('id_produk', $id)
            ->update([
                'nama_produk' => $validated['nama_produk'],
            ]);

        return redirect()
            ->route('produk.dashboard-produk')
            ->with(['message' => ' Edit ' . $validated['nama_produk']]);
    }


}
