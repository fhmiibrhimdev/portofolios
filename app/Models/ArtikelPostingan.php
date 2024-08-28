<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelPostingan extends Model
{
    use HasFactory;
    protected $table = "artikel_postingan";
    protected $guarded = [];

    public function getTags()
    {
        $subKategoriId = explode(',', $this->id_sub_kategori);
        return ArtikelSubKategori::select('nama_sub_kategori')->whereIn('id', $subKategoriId)->get();
    }
}
