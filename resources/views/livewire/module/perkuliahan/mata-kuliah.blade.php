<div>
    <section class='section custom-section'>
        <div class='section-header'>
            <h1>Mata Kuliah</h1>
        </div>

        <div class='section-body'>
            <div class='card'>
                <h3>Tabel Mata Kuliah</h3>
                <div class='card-body'>
                    <div class='show-entries'>
                        <p class='show-entries-show'>Show</p>
                        <select wire:model.live='lengthData' id='length-data'>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                            <option value='100'>100</option>
                            <option value='250'>250</option>
                            <option value='500'>500</option>
                        </select>
                        <p class='show-entries-entries'>Entries</p>
                    </div>
                    <div class='search-column'>
                        <p>Search: </p><input type='search' wire:model.live.debounce.750ms='searchTerm'
                            id='search-data' placeholder='Search here...' class='form-control'>
                    </div>
                    <div class='table-responsive tw-max-h-96'>
                        <table class="tw-table-auto">
                            <thead class='tw-sticky tw-top-0'>
                                <tr class='tw-text-gray-700'>
                                    <th width='1%' class='text-center'>No</th>
                                    <th class='text-center'>Kode Matkul</th>
                                    <th>Mata Kuliah</th>
                                    <th class='text-center'>SKS</th>
                                    <th>Dosen</th>
                                    <th class='text-center'><i class='fas fa-cog'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class='text-center'>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class='text-center'>{{ $row->kode_matkul }}</td>
                                        <td class='text-left'>{{ $row->nama_matkul }}</td>
                                        <td class='text-center'>{{ $row->sks }}</td>
                                        <td class='text-left'>{{ $row->nama_dosen }}</td>
                                        <td>
                                            <button wire:click.prevent='edit({{ $row->id }})'
                                                class='btn btn-primary' data-toggle='modal'
                                                data-target='#formDataModal'>
                                                <i class='fas fa-edit'></i>
                                            </button>
                                            <button wire:click.prevent='deleteConfirm({{ $row->id }})'
                                                class='btn btn-danger'>
                                                <i class='fas fa-trash'></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan='6' class='text-center'>No data available in the table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class='mt-5 px-3'>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <button wire:click.prevent='isEditingMode(false)' class='btn-modal' data-toggle='modal' data-backdrop='static'
            data-keyboard='false' data-target='#formDataModal'>
            <i class='far fa-plus'></i>
        </button>
    </section>

    <div class='modal fade' wire:ignore.self id='formDataModal' aria-labelledby='formDataModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='formDataModalLabel'>{{ $isEditing ? 'Edit Data' : 'Add Data' }}</h5>
                    <button type='button' wire:click='cancel()' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form>
                    <div class='modal-body'>
                        <div class='form-group'>
                            <label for='id_dosen'>Dosen</label>
                            <select wire:model='id_dosen' id='id_dosen' class='form-control'>
                                <option value=''>-- Pilih Dosen --</option>
                                @foreach ($dosens as $dosen)
                                    <option value='{{ $dosen->id }}'>{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                            @error('id_dosen')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='kode_matkul'>Kode Matkul</label>
                            <input type='text' wire:model='kode_matkul' id='kode_matkul'
                                class='form-control tw-uppercase'>
                            @error('kode_matkul')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='nama_matkul'>Mata Kuliah</label>
                            <input type='text' wire:model='nama_matkul' id='nama_matkul' class='form-control'>
                            @error('nama_matkul')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='sks'>SKS</label>
                            <input type='number' wire:model='sks' id='sks' class='form-control'>
                            @error('sks')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' wire:click='cancel()' class='btn btn-secondary tw-bg-gray-300'
                            data-dismiss='modal'>Close</button>
                        <button type='submit' wire:click.prevent='{{ $isEditing ? 'update()' : 'store()' }}'
                            wire:loading.attr='disabled' class='btn btn-primary tw-bg-blue-500'>Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('general-css')
    <link href="{{ asset('assets/midragon/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('js-libraries')
    <script src="{{ asset('/assets/midragon/select2/select2.full.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        window.addEventListener('initSelect2', event => {
            $(document).ready(function() {
                $('#id_dosen').select2();

                $('#id_dosen').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });
            });
        })
    </script>
@endpush
