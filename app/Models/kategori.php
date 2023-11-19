<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
   
    // Nama tabel yang sesuai dengan model
    protected $table = 'kategoris';
    // Kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
    'nama_kategori', 
    'nama_pemilik',
    ];
    
}



