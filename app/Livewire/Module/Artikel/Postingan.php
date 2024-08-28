<?php

namespace App\Livewire\Module\Artikel;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\ArtikelKategori;
use App\Models\ArtikelPostingan;
use App\Models\ArtikelSubKategori;
use Illuminate\Support\Facades\Auth;

class Postingan extends Component
{
    use WithPagination;
    #[Title('Postingan')]

    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'id_kategori' => 'required',
        'id_sub_kategori' => 'required',
        'judul' => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;
    public $kategoris, $subkategoris;
    public $dataId, $id_kategori, $id_sub_kategori, $tanggal, $judul, $slug, $deskripsi, $isi_konten, $status_publish;

    public function mount()
    {
        $this->tanggal         = date('Y-m-d H:i');
        $this->kategoris       = ArtikelKategori::select('id', 'nama_kategori')->get()->toArray();
        $this->id_kategori     = ArtikelKategori::min('id');
        $this->subkategoris    = ArtikelSubKategori::select('id', 'nama_sub_kategori')->where('id_kategori', $this->id_kategori)->get()->toArray();
        $this->id_sub_kategori = [];
        $this->judul           = '';
        $this->slug            = null;
        $this->deskripsi       = '';
        $this->isi_konten      = '';
        $this->status_publish  = 'Draft';
    }

    private function initSelect2()
    {
        $this->dispatch('initSelect2');
        $this->dispatch('initSummernote');
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

    public function updatedIdKategori()
    {
        $this->subkategoris    = ArtikelSubKategori::select('id', 'nama_sub_kategori')->where('id_kategori', $this->id_kategori)->get()->toArray();
        $this->dispatch('initSelect2SubKategori');
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ArtikelPostingan::select('id', 'id_sub_kategori', 'tanggal', 'judul', 'slug', 'status_publish')
            ->where(function ($query) use ($search) {
                $query->where('judul', 'LIKE', $search);
                $query->orWhere('tanggal', 'LIKE', $search);
            })
            ->orderBy('id', 'DESC')
            ->paginate($this->lengthData);

        return view('livewire.module.artikel.postingan', compact('data'));
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
        $this->initSelect2();
    }

    private function resetInputFields()
    {
        $this->mount();
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ArtikelPostingan::create([
            'id_user'         => Auth::user()->id,
            'id_kategori'     => $this->id_kategori,
            'id_sub_kategori' => implode(',', $this->id_sub_kategori),
            'tanggal'         => $this->tanggal,
            'judul'           => $this->judul,
            'slug'            => strtolower(Str::slug($this->slug) != "" ? Str::slug($this->slug) : Str::slug($this->judul)),
            'deskripsi'       => $this->deskripsi,
            'isi_konten'      => $this->isi_konten,
            'status_publish'  => $this->status_publish,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing       = true;
        $data                  = ArtikelPostingan::findOrFail($id);
        $this->dataId          = $id;
        $this->id_kategori     = $data->id_kategori;
        $this->id_sub_kategori = explode(',', $data->id_sub_kategori);
        $this->tanggal         = $data->tanggal;
        $this->judul           = $data->judul;
        $this->slug            = $data->slug;
        $this->deskripsi       = $data->deskripsi;
        $this->isi_konten      = $data->isi_konten;
        $this->status_publish  = $data->status_publish;
        $this->subkategoris    = ArtikelSubKategori::select('id', 'nama_sub_kategori')->where('id_kategori', $this->id_kategori)->get()->toArray();
        $this->dispatch('initSelect2SubKategori');

        $this->initSelect2();
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ArtikelPostingan::findOrFail($this->dataId)->update([
                'id_user'         => Auth::user()->id,
                'id_kategori'     => $this->id_kategori,
                'id_sub_kategori' => implode(',', $this->id_sub_kategori),
                'tanggal'         => $this->tanggal,
                'judul'           => $this->judul,
                'slug'            => strtolower(Str::slug($this->slug) != "" ? Str::slug($this->slug) : Str::slug($this->judul)),
                'deskripsi'       => $this->deskripsi,
                'isi_konten'      => $this->isi_konten,
                'status_publish'  => $this->status_publish,
            ]);

            $this->dispatchAlert('success', 'Success!', 'Data updated successfully.');
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
        ArtikelPostingan::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
