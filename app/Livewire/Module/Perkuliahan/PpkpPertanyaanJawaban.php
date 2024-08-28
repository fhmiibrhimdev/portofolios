<?php

namespace App\Livewire\Module\Perkuliahan;

use App\Models\Ppkp as ModelsPpkp;
use Livewire\Component;
use Livewire\WithPagination;

class PpkpPertanyaanJawaban extends Component
{
    use WithPagination;

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';

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
            ->orWhere('jawaban', 'LIKE', $search)
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.ppkp-pertanyaan-jawaban', compact('data'))->extends('components.layouts.welcome')->title('List Pertanyaan Jawaban PKKP');
    }
}
