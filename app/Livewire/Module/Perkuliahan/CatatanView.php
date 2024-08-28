<?php

namespace App\Livewire\Module\Perkuliahan;

use App\Models\Catatan;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Title;
use Livewire\Component;

class CatatanView extends Component
{
    public $tgl_dibuat, $kode_matkul, $nama_matkul, $judul, $isi_catatan, $title;

    public function mount($slug)
    {
        $data = Catatan::select('catatan.id', 'catatan.judul', 'catatan.slug', 'catatan.tgl_dibuat', 'catatan.isi_catatan', 'catatan.status', 'mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul')
            ->join('mata_kuliah', 'mata_kuliah.id', 'catatan.id_matkul')
            ->where('slug', $slug)->firstOrFail();
        $this->tgl_dibuat = $data->tgl_dibuat ?? "";
        $this->title = $data->judul ?? "";
        $this->judul = $data->judul ?? "";
        $this->kode_matkul = $data->kode_matkul ?? "";
        $this->nama_matkul = $data->nama_matkul ?? "";
        $this->isi_catatan = $data->isi_catatan ?? "";
    }

    public function render()
    {
        return view('livewire.module.perkuliahan.catatan-view')->extends('components.layouts.welcome')->title($this->title);
    }
}
