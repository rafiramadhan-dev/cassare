<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "kategori"; // Name Table

    protected $primaryKey = "id_kategori"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_kategori', 'nama_kategori', 'foto_kategori']; // Field Table
}
