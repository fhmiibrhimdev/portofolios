<?php

namespace App\Livewire\Module\Perkuliahan;

use Livewire\Component;
use App\Models\MataKuliah;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Catatan as ModelsCatatan;
use Carbon\Carbon;

class Catatan extends Component
{
    use WithPagination;
    #[Title('Catatan')]

    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'id_matkul'           => 'required',
        'judul'               => 'required',
        // 'slug'                => '',
        'isi_catatan'         => 'required',
        'tgl_dibuat'          => 'required',
        'status'              => 'required',
    ];

    public $lengthData = 25;
    public $searchTerm;
    public $previousSearchTerm = '';
    public $isEditing = false;

    public $dataId;
    public $matkuls;
    public $id_matkul, $judul, $slug, $isi_catatan, $tgl_dibuat, $status;

    public function mount()
    {
        $this->matkuls             = MataKuliah::select('id', 'kode_matkul', 'nama_matkul')->get();
        $this->id_matkul           = '';
        $this->judul               = '';
        $this->slug                = '';
        $this->isi_catatan         = '';
        $this->tgl_dibuat          = date('Y-m-d');
        $this->status              = 'Belum Dimulai';

        $this->initSelect2();
    }

    public function initSelect2()
    {
        $this->dispatch('initSelect2');
        $this->dispatch('initSummernote');
    }

    public function render()
    {
        Carbon::setLocale('id');
        $this->searchResetPage();
        $search = '%' . $this->searchTerm . '%';

        $data = ModelsCatatan::select('catatan.id', 'catatan.judul', 'catatan.slug', 'catatan.tgl_dibuat', 'catatan.status', 'mata_kuliah.kode_matkul', 'mata_kuliah.nama_matkul')
            ->where(function ($query) use ($search) {
                $query->orWhere('judul', 'LIKE', $search);
                $query->orWhere('tgl_dibuat', 'LIKE', $search);
                $query->orWhere('status', 'LIKE', $search);
            })
            ->join('mata_kuliah', 'mata_kuliah.id', 'catatan.id_matkul')
            ->orderBy('id', 'ASC')
            ->paginate($this->lengthData);

        return view('livewire.module.perkuliahan.catatan', compact('data'));
    }

    public function store()
    {
        $this->validate();

        ModelsCatatan::create([
            'id_matkul'           => $this->id_matkul,
            'judul'               => $this->judul,
            'slug'                => Str::slug($this->judul),
            'isi_catatan'         => $this->isi_catatan,
            'tgl_dibuat'          => $this->tgl_dibuat,
            'status'              => $this->status,
        ]);

        $this->dispatchAlert('success', 'Success!', 'Data created successfully.');
    }

    public function edit($id)
    {
        $this->isEditing        = true;
        $data = ModelsCatatan::where('id', $id)->first();
        $this->dataId           = $id;
        $this->id_matkul        = $data->id_matkul;
        $this->judul            = $data->judul;
        $this->isi_catatan      = $data->isi_catatan;
        $this->tgl_dibuat       = $data->tgl_dibuat;
        $this->status           = $data->status;

        $this->initSelect2();
    }

    public function update()
    {
        $this->validate();

        if ($this->dataId) {
            ModelsCatatan::findOrFail($this->dataId)->update([
                'id_matkul'           => $this->id_matkul,
                'judul'               => $this->judul,
                'slug'                => Str::slug($this->judul),
                'isi_catatan'         => $this->isi_catatan,
                'tgl_dibuat'          => $this->tgl_dibuat,
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
        ModelsCatatan::findOrFail($this->dataId)->delete();
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
        $this->initSelect2();
        $this->isEditing = $mode;
    }

    private function resetInputFields()
    {
        $this->id_matkul           = '';
        $this->judul               = '';
        $this->slug                = '';
        $this->isi_catatan         = '';
        $this->tgl_dibuat          = date('Y-m-d');
        $this->status              = 'Belum Dimulai';
    }

    public function cancel()
    {
        $this->isEditing       = false;
        $this->resetInputFields();
    }
}
