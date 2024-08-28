<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelKategori extends Model
{
    use HasFactory;
    protected $table    = "artikel_kategori";
    protected $guarded  = [];

    public $timestamps = false;
}
