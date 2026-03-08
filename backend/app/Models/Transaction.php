<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Struktur Tabel Transaksi

    protected $table = "transaksi"; // Nama Tabel

    protected $primaryKey = "id_transaksi"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_transaksi', 'harga_transaksi', 'keuntungan_transaksi', 'detail_transaksi', 'level_admin', 'fid_admin', 'fid_produk']; // Field Tabel
}
