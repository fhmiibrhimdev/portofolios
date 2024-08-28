<?php

namespace App\Livewire\Module\Perkuliahan;

use App\Models\Dosen;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\MataKuliah as ModelsMataKuliah;

class MataKuliah extends Component
{
    use WithPagination;
    #[Title('Mata Kuliah')]

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'id_dosen'            => 'required',
        'kode_matkul'         => 'required',
        'nama_matkul'         => 'required',
        'sks'                 => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId;
    public $dosens;
    public $id_dosen, $kode_matkul, $nama_matkul, $sks;

    public function mount()
    {
        $this->dosens = Dosen::select('id', 'nama_dosen')->get();

        $this->id_dosen            = '';
        $this->kode_matkul         = '';
        $this->nama_matkul         = '';
        $this->sks                 = '';
    }

    private function initSelect2()
    {
        $this->dispatch('initSelect2');
    }

    public function render()
    {
        $this->initSelect2();

        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ModelsMataKuliah::select('mata_kuliah.*', 'dosen.nama_dosen')
            ->where(function ($query) use ($search) {
                $query->orWhere('id_dosen', 'LIKE', $search);
                $query->orWhere('kode_matkul', 'LIKE', $search);
                $query->orWhere('nama_matkul', 'LIKE', $search);
                $query->orWhere('sks', 'LIKE', $search);
            })
            ->join('dosen', 'dosen.id', 'mata_kuliah.id_dosen')
            ->orderBy('id', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.mata-kuliah', compact('data'));
    }

    public function store()
    {
        $this->validate();

        ModelsMataKuliah::create([
            'id_dosen'            => $this->id_dosen,
            'kode_matkul'         => strtoupper($this->kode_matkul),
            'nama_matkul'         => $this->nama_matkul,
            'sks'                 => $this->sks,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing        = true;
        $data = ModelsMataKuliah::where('id', $id)->first();
        $this->dataId           = $id;
        $this->id_dosen         = $data->id_dosen;
        $this->kode_matkul      = $data->kode_matkul;
        $this->nama_matkul      = $data->nama_matkul;
        $this->sks              = $data->sks;
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsMataKuliah::findOrFail($this->dataId)->update([
                'id_dosen'            => $this->id_dosen,
                'kode_matkul'         => strtoupper($this->kode_matkul),
                'nama_matkul'         => $this->nama_matkul,
                'sks'                 => $this->sks,
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
        ModelsMataKuliah::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
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
        $this->id_dosen            = 'opsi1';
        $this->kode_matkul         = '';
        $this->nama_matkul         = '';
        $this->sks                 = '';
    }

    public function cancel()
    {
        $this->isEditing       = false;
        $this->resetInputFields();
    }
}
