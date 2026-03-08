<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Struktur Tabel Produk

    protected $table = "produk"; // Nama Tabel

    protected $primaryKey = "id_produk"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_produk', 'nama_produk', 'stok_produk', 'modal_produk', 'harga_produk', 'keuntungan_produk', 'foto_produk', 'deskripsi_produk', 'status_produk', 'estimasi_produk', 'fid_kategori']; // Field Tabel
}
