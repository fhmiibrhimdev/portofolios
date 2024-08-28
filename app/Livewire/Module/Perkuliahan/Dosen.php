<?php

namespace App\Livewire\Module\Perkuliahan;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Dosen as ModelsDosen;

class Dosen extends Component
{
    use WithPagination;
    #[Title('Perkuliahan')]

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        // 'nidn'                => 'required',
        'nama_dosen'          => 'required',
        'jk'                  => 'required',
        // 'foto_profile'        => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId;

    public $nidn, $nama_dosen, $jk, $foto_profile;

    public function mount()
    {
        $this->nidn                = '';
        $this->nama_dosen          = '';
        $this->jk                  = '-';
        $this->foto_profile        = '';
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

        $data = ModelsDosen::select('dosen.*')
            ->where(function ($query) use ($search) {
                $query->where('nidn', 'LIKE', $search);
                $query->orWhere('nama_dosen', 'LIKE', $search);
                $query->orWhere('jk', 'LIKE', $search);
                $query->orWhere('foto_profile', 'LIKE', $search);
            })
            ->orderBy('id', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.dosen', compact('data'));
    }

    public function store()
    {
        $this->validate();

        ModelsDosen::create([
            'nidn'                => $this->nidn,
            'nama_dosen'          => $this->nama_dosen,
            'jk'                  => $this->jk,
            'foto_profile'        => $this->foto_profile,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing        = true;
        $data = ModelsDosen::where('id', $id)->first();
        $this->dataId           = $id;
        $this->nidn             = $data->nidn;
        $this->nama_dosen       = $data->nama_dosen;
        $this->jk               = $data->jk;
        $this->foto_profile     = $data->foto_profile;
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsDosen::findOrFail($this->dataId)->update([
                'nidn'                => $this->nidn,
                'nama_dosen'          => $this->nama_dosen,
                'jk'                  => $this->jk,
                'foto_profile'        => $this->foto_profile,
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
        ModelsDosen::findOrFail($this->dataId)->delete();
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
        $this->nidn                = '';
        $this->nama_dosen          = '';
        $this->jk                  = '-';
        $this->foto_profile        = '';
    }

    public function cancel()
    {
        $this->isEditing       = false;
        $this->resetInputFields();
    }
}
