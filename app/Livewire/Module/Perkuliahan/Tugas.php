<?php

namespace App\Livewire\Module\Perkuliahan;

use Livewire\Component;
use App\Models\MataKuliah;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Tugas as ModelsTugas;

class Tugas extends Component
{
    use WithPagination;
    #[Title('Tugas')]

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'id_matkul'           => 'required',
        'tgl'                 => 'required',
        'tgl_deadline'        => 'required',
        'judul_tugas'         => 'required',
        'deskripsi'           => 'required',
        'kategori'            => 'required',
        'tipe'                => 'required',
        'status'              => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId;
    public $matkuls;
    public $id_matkul, $tgl, $tgl_deadline, $judul_tugas, $deskripsi, $jawaban, $kategori, $tipe, $status;

    public function mount()
    {
        $this->matkuls             = MataKuliah::select('id', 'kode_matkul', 'nama_matkul')->get();

        $this->id_matkul           = '';
        $this->tgl                 = date('Y-m-d');
        $this->tgl_deadline        = date('Y-m-d');
        $this->judul_tugas         = '';
        $this->deskripsi           = '';
        $this->jawaban             = '';
        $this->kategori            = '';
        $this->tipe                = '';
        $this->status              = '';

        $this->initSelect2();
    }

    public function initSelect2()
    {
        $this->dispatch('initSelect2');
        $this->dispatch('initSummernote');
    }

    public function render()
    {
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ModelsTugas::select('tugas.*', 'mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul')
            ->where(function ($query) use ($search) {
                $query->orWhere('judul_tugas', 'LIKE', $search);
                $query->orWhere('kategori', 'LIKE', $search);
                $query->orWhere('tipe', 'LIKE', $search);
                $query->orWhere('status', 'LIKE', $search);
            })
            ->join('mata_kuliah', 'mata_kuliah.id', 'tugas.id_matkul')
            ->orderBy('tgl_deadline', 'ASC')
            ->orderBy('status', 'DESC')
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.tugas', compact('data'));
    }

    public function store()
    {
        $this->validate();

        ModelsTugas::create([
            'id_matkul'           => $this->id_matkul,
            'tgl'                 => $this->tgl,
            'tgl_deadline'        => $this->tgl_deadline,
            'judul_tugas'         => $this->judul_tugas,
            'deskripsi'           => $this->deskripsi,
            'jawaban'             => $this->jawaban,
            'kategori'            => $this->kategori,
            'tipe'                => $this->tipe,
            'status'              => $this->status,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing        = true;
        $data = ModelsTugas::where('id', $id)->first();
        $this->dataId           = $id;
        $this->id_matkul        = $data->id_matkul;
        $this->tgl              = $data->tgl;
        $this->tgl_deadline     = $data->tgl_deadline;
        $this->judul_tugas      = $data->judul_tugas;
        $this->deskripsi        = $data->deskripsi;
        $this->jawaban          = $data->jawaban;
        $this->kategori         = $data->kategori;
        $this->tipe             = $data->tipe;
        $this->status           = $data->status;

        $this->initSelect2();
    }

    public function detail($id)
    {
        $data = ModelsTugas::where('id', $id)->first();
        $this->dataId           = $id;
        $this->id_matkul        = $data->id_matkul;
        $this->tgl              = $data->tgl;
        $this->tgl_deadline     = $data->tgl_deadline;
        $this->judul_tugas      = $data->judul_tugas;
        $this->deskripsi        = $data->deskripsi;
        $this->jawaban          = $data->jawaban;
        $this->kategori         = $data->kategori;
        $this->tipe             = $data->tipe;
        $this->status           = $data->status;

        $this->initSelect2();
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsTugas::findOrFail($this->dataId)->update([
                'id_matkul'           => $this->id_matkul,
                'tgl'                 => $this->tgl,
                'tgl_deadline'        => $this->tgl_deadline,
                'judul_tugas'         => $this->judul_tugas,
                'deskripsi'           => $this->deskripsi,
                'jawaban'             => $this->jawaban,
                'kategori'            => $this->kategori,
                'tipe'                => $this->tipe,
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
        ModelsTugas::findOrFail($this->dataId)->delete();
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
        $this->id_matkul           = '';
        $this->tgl                 = date('Y-m-d');
        $this->tgl_deadline        = date('Y-m-d');
        $this->judul_tugas         = '';
        $this->deskripsi           = '';
        $this->jawaban             = '';
        $this->kategori            = '';
        $this->tipe                = '';
        $this->status              = '';
    }

    public function cancel()
    {
        $this->isEditing       = false;
        $this->resetInputFields();
    }
}
