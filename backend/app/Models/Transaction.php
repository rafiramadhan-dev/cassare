<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaksi"; // Name Table

    protected $primaryKey = "id_transaksi"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_transaksi', 'harga_transaksi', 'keuntungan_transaksi', 'detail_transaksi', 'level_admin', 'fid_admin', 'fid_produk']; // Field Table
}
