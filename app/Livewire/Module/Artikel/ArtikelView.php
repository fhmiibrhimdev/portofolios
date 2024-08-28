<?php

namespace App\Livewire\Module\Artikel;

use App\Models\ArtikelPostingan;
use Exception;
use Livewire\Attributes\Title;
use Livewire\Component;

class ArtikelView extends Component
{
    public $title, $tanggal, $judul, $deskripsi, $isi_konten, $status_publish;

    public function mount($slug)
    {
        $data = ArtikelPostingan::select('*')
            ->where('slug', $slug)->firstOrFail();
        $this->tanggal = $data->tanggal ?? "";
        $this->title = $data->judul ?? "";
        $this->judul = $data->judul ?? "";
        $this->deskripsi = $data->deskripsi ?? "";
        $this->isi_konten = $data->isi_konten ?? "";
        $this->status_publish = $data->status_publish ?? "";
    }

    public function render()
    {
        return view('livewire.module.artikel.artikel-view')->extends('components.layouts.welcome')->title($this->title);
    }
}
