<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction"; // Name Table

    protected $primaryKey = "id_transaction"; // Primary Key

    public $incrementing = true; // Incrementing

    public $timestamps = true; // Timestamps

    protected $fillable = ['id_transaction', 'price', 'profit', 'detail', 'time', 'id_admin', 'id_product']; // Field Table
}
