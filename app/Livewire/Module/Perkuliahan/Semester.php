<?php

namespace App\Livewire\Module\Perkuliahan;

use App\Models\Semester as ModelsSemester;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class Semester extends Component
{
    use WithPagination;
    #[Title('Semester')]

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'kode_semester'       => 'required',
        'nama_semester'       => 'required',
        'status'              => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId;

    public $kode_semester, $nama_semester, $status;

    public function mount()
    {
        $this->kode_semester       = '';
        $this->nama_semester       = '';
        $this->status              = '';
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ModelsSemester::select('semester.*')
            ->where(function ($query) use ($search) {
                $query->where('kode_semester', 'LIKE', $search);
                $query->orWhere('nama_semester', 'LIKE', $search);
            })
            ->orderBy('id', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.semester', compact('data'));
    }

    public function store()
    {
        $this->validate();

        ModelsSemester::create([
            'kode_semester'       => $this->kode_semester,
            'nama_semester'       => $this->nama_semester,
            'status'              => $this->status,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing        = true;
        $data = ModelsSemester::where('id', $id)->first();
        $this->dataId           = $id;
        $this->kode_semester    = $data->kode_semester;
        $this->nama_semester    = $data->nama_semester;
        $this->status           = $data->status;
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsSemester::findOrFail($this->dataId)->update([
                'kode_semester'       => $this->kode_semester,
                'nama_semester'       => $this->nama_semester,
                'status'              => $this->status,
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
        ModelsSemester::findOrFail($this->dataId)->delete();
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
        $this->kode_semester       = '';
        $this->nama_semester       = '';
        $this->status              = '';
    }

    public function cancel()
    {
        $this->isEditing       = false;
        $this->resetInputFields();
    }

    public function active($id, $active)
    {
        ModelsSemester::query()->update(['status' => '0']);
        ModelsSemester::where('id', $id)->update(['status' => $active]);
    }
}
