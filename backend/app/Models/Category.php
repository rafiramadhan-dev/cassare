<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Struktur Tabel Kategori

    protected $table = "kategori"; // Nama Tabel

    protected $primaryKey = "id_kategori"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_kategori', 'nama_kategori', 'foto_kategori']; // Field Tabel
}
