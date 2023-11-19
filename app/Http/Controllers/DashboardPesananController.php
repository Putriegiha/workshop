<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPesananController extends Controller
{
    public function dashboardPesanan()
    {
        $pemesanans = DB::table('pemesanans')
            ->get();

        return view('pages.dashboard.pesanan.dashboard-pesanan', [
            'pemesanans' => $pemesanans,
        ]);
    }

    public function formTambah()
    {
        $pemesanans = DB::table('pemesanans')->get()->map(function ($pemesanans) {
            return [
                'label' => $pemesanans->id_pemesanan,
                'value' => $pemesanans->id_pemesanan,
            ];
        })->toArray();

        return view('pages.dashboard.pesanan.form-tambah', ['pemesanans' => $pemesanans]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|exists:pesanan,id_pemesanan',
            'jumlah_produk_pemesanan' => 'required|float',
            'tanggal_pemesanan' => 'required|date',
            'sub_total_pemesanan' => 'required|boolean',
        ]);

        DB::table('pemesanans')->insert([
            'id_pemesanan' => $validated['id_pemesanan'],
            'id_pemesanan' => $validated['id_pemesanan'],
            'tanggal_pemesanan' => $validated['tanggal_pemesanan'],
            'sub_total_pemesanan' => $validated['sub_total_pemesanan'],
        ]);

        return redirect()
            ->route('pesanan.dashboard-pesanan')
            ->with(['message' => ' Berhasil Simpan ']);
    }

    public function formEdit(int $id)
    {
        $pemesanans = DB::table('pemesanans')->get()->map(function ($pemesanans) {
            return [
                'label' => $pemesanans->id_pemesanan,
                'value' => $pemesanans->id_pemesanan,
            ];
        })->toArray();
        return view('pages.dashboard.pesanan.form-edit', [
            'pemesanan' => $pemesanans,
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required',
        ]);

        DB::table('pemesanas')
            ->where('id_pemesanans', $id)
            ->update([
                'id_pemesanan' => $validated['id_pemesanan'],
            ]);

        return redirect()
            ->route('pesanan.dashboard-pesanan')
            ->with(['message' => ' Edit ']);
    }

}
