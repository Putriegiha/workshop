<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_kategori extends Model
{
    // Nama tabel yang sesuai dengan model
    protected $table = 'detail_kategoris';

    // Definisikan relasi dengan tabel 'pemesanans'
    public function pemesanan()
    {
    return $this->belongsTo('App\Pemesanan', 'id_pemesanan', 'id_pemesanan');
    }
    // Definisikan relasi dengan tabel 'kategoris'
    public function kategori()
    {
    return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

}
