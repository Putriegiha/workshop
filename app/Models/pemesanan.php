<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    // Nama tabel yang sesuai dengan model
    protected $table = 'pemesanans';
    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
    'jumlah_produk_pemesanan', 
    'tanggal_pemesanan', 
    'sub_total_pemesanan', 
    'id_kategori', 
    'id_pengguna', 
    'id_pembayaran',
    ];

    // Definisikan relasi dengan tabel 'kategoris'
    public function kategori()
    {
    return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }
    // Definisikan relasi dengan tabel 'users'
    public function pengguna()
    {
    return $this->belongsTo('App\User', 'id_pengguna', 'id_pengguna');
    }
    // Definisikan relasi dengan tabel 'pembayarans'
    public function pembayaran()
    {
    return $this->belongsTo('App\Pembayaran', 'id_pembayaran', 'id_pembayaran');
    }

}
