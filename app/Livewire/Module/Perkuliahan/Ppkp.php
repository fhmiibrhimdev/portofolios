<?php

namespace App\Livewire\Module\Perkuliahan;

use App\Models\Ppkp as ModelsPpkp;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class Ppkp extends Component
{
    use WithPagination;
    #[Title('PPKP')]

    protected $listeners = [
        'delete'
    ];
    protected $rules = [
        'pertanyaan' => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId, $pertanyaan, $jawaban;

    public function mount()
    {
        $this->pertanyaan = '';
        $this->jawaban = '';

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

    public function render()
    {
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ModelsPpkp::where('pertanyaan', 'LIKE', $search)
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.ppkp', compact('data'));
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
        $this->pertanyaan = '';
        $this->jawaban = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate();

        ModelsPpkp::create([
            'pertanyaan'     => $this->pertanyaan,
            'jawaban'     => $this->jawaban,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $data = ModelsPpkp::findOrFail($id);
        $this->dataId = $id;
        $this->pertanyaan  = $data->pertanyaan;
        $this->jawaban  = $data->jawaban;

        $this->dispatch('initSummernote');
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsPpkp::findOrFail($this->dataId)->update([
                'pertanyaan'     => $this->pertanyaan,
                'jawaban'     => $this->jawaban,
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
        ModelsPpkp::findOrFail($this->dataId)->delete();
        $this->dispatchAlert('success', 'Success!', 'Data deleted successfully.');
    }
}
