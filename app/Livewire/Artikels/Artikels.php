<?php

namespace App\Livewire\Artikels;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\ArtikelKategori;
use App\Models\ArtikelPostingan;
use App\Models\ArtikelSubKategori;
use Illuminate\Support\Facades\DB;

class Artikels extends Component
{
    use WithPagination;
    #[Title('Artikel')]

    protected $paginationTheme = 'tailwind';

    public $kategori, $id_sub_kategori, $data;

    public function mount($kategori = null)
    {
        $this->id_sub_kategori = ArtikelSubKategori::where('nama_sub_kategori', $kategori)->first()->id ?? 0;
        $this->kategori = $kategori;
    }

    public function render()
    {
        if ($this->id_sub_kategori == 0) {
            $this->data = ArtikelKategori::select('artikel_kategori.nama_kategori', 'artikel_sub_kategori.gambar', 'artikel_sub_kategori.nama_sub_kategori')
                ->join('artikel_sub_kategori', 'artikel_sub_kategori.id_kategori', 'artikel_kategori.id')
                ->get();

            $posts = [];
        } else {
            $posts = ArtikelPostingan::select('*')
                ->whereRaw("FIND_IN_SET(?, id_sub_kategori) > 0", [$this->id_sub_kategori])
                ->where('status_publish', 'Published')
                ->paginate(10);
        }

        return view('livewire.artikels.artikels', compact('posts'))->extends('components.layouts.welcome');
    }
}
