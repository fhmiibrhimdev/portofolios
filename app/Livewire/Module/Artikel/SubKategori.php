<?php

namespace App\Livewire\Module\Artikel;

use App\Models\ArtikelKategori;
use App\Models\ArtikelSubKategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class SubKategori extends Component
{
    use WithPagination;
    #[Title('Artikel - Sub Kategori')]

    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'id_kategori'     => 'required',
        'nama_sub_kategori'  => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $id_kategori, $nama_sub_kategori, $deskripsi, $gambar, $kategoris;

    public function mount()
    {
        $this->kategoris = ArtikelKategori::select('id', 'nama_kategori')->get();

        $this->id_kategori    = ArtikelKategori::min('id');
        $this->nama_sub_kategori = '';
        $this->deskripsi      = '';
        $this->gambar            = '';
    }

    private function initSelect2()
    {
        $this->dispatch('initSelect2');
    }

    public function updatingLengthData()
    {
        $this->resetPage();
    }

    private function searchResetPage()
    {
        if ($this->searchTerm !== $this->previousSearchTerm) {
            $this->resetPage();
        }

        $this->previousSearchTerm = $this->searchTerm;
    }

    public function render()
    {
        $this->initSelect2();

        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ArtikelSubKategori::select('artikel_sub_kategori.*', 'artikel_kategori.nama_kategori')
            ->join('artikel_kategori', 'artikel_kategori.id', 'artikel_sub_kategori.id_kategori')
            ->where('nama_sub_kategori', 'LIKE', $search)
            ->orWhere('deskripsi', 'LIKE', $search)
            ->orWhere('nama_kategori', 'LIKE', $search)
            ->orderBy('nama_kategori', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.artikel.sub-kategori', compact('data'));
    }

    private function dispatchAlert($type, $message, $text)
    {
        $this->dispatch('swal:modal', [
            'type'      => $type,
            'message'   => $message,
            'text'      => $text
        ]);

        $this->resetInputFields();
    }

    public function isEditingMode($mode)
    {
        $this->isEditing = $mode;
    }

    private function resetInputFields()
    {
        $this->nama_sub_kategori = '';
        $this->deskripsi      = '';
        $this->gambar            = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ArtikelSubKategori::create([
            'id_kategori'     => $this->id_kategori,
            'nama_sub_kategori'  => $this->nama_sub_kategori,
            'deskripsi'       => $this->deskripsi,
            'gambar'             => $this->gambar,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $data = ArtikelSubKategori::where('id', $id)->first();
        $this->dataId           = $id;
        $this->id_kategori    = $data->id_kategori;
        $this->nama_sub_kategori = $data->nama_sub_kategori;
        $this->deskripsi      = $data->deskripsi;
        $this->gambar            = $data->gambar;
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ArtikelSubKategori::findOrFail($this->dataId)->update([
                'id_kategori'     => $this->id_kategori,
                'nama_sub_kategori'  => $this->nama_sub_kategori,
                'deskripsi'       => $this->deskripsi,
                'gambar'             => $this->gambar,
            ]);
            $this->dispatchAlert('success', 'Success!', 'Data updated successfully.');
            $this->resetInputFields();
            $this->dataId = null;
        }
    }

    public function deleteConfirm($id)
    {
        $this->dataId = $id;
        $this->dispatch('swal:confirm', [
            'type'      => 'warning',
            'message'   => 'Are you sure?',
            'text'      => 'If you delete the data, it cannot be restored!'
        ]);
    }

    public function delete()
    {
        ArtikelSubKategori::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
        $this->resetInputFields();
    }
}
