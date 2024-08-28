<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelSubKategori extends Model
{
    use HasFactory;
    protected $table    = "artikel_sub_kategori";
    protected $guarded  = [];

    public $timestamps = false;
}
