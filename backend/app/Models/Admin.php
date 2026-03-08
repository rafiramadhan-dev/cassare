<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens;

    protected $table = "admin"; // Name Table

    protected $primaryKey = "id_admin"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_admin', 'nama_admin', 'email_admin', 'password_admin', 'foto_admin', 'level_admin', 'status_admin']; // Field Table
}
