<?php

namespace App\Livewire\Module\Artikel;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\ArtikelKategori;

class Kategori extends Component
{
    use WithPagination;
    #[Title('Kategori')]

    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'nama_kategori'     => 'required',
    ];

    public $lengthData = 15;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $nama_kategori;

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
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ArtikelKategori::where('nama_kategori', 'LIKE', $search)
            ->orderBy('id', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.artikel.kategori', compact('data'));
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
        $this->nama_kategori = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ArtikelKategori::create([
            'nama_kategori'     => $this->nama_kategori,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $data = ArtikelKategori::where('id', $id)->first();
        $this->dataId           = $id;
        $this->nama_kategori    = $data->nama_kategori;
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ArtikelKategori::findOrFail($this->dataId)->update([
                'nama_kategori'     => $this->nama_kategori
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
        ArtikelKategori::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
        $this->resetInputFields();
    }
}
