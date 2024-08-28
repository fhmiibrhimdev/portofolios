<div>
    <section class='section custom-section'>
        <div class='section-header'>
            <h1>Dosen</h1>
        </div>

        <div class='section-body'>
            <div class='card'>
                <h3>Tabel Dosen</h3>
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
                                    <th width='6%' class='text-center'>No</th>
                                    <th>NIDN</th>
                                    <th>Nama Dosen</th>
                                    <th class='text-center'>JK</th>
                                    <th>Foto Profile</th>
                                    <th class='text-center'><i class='fas fa-cog'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class='text-center'>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class='text-left'>{{ $row->nidn }}</td>
                                        <td class='text-left'>{{ $row->nama_dosen }}</td>
                                        <td class='text-center'>{{ $row->jk }}</td>
                                        <td class='text-left'>{{ $row->foto_profile }}</td>
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
                            <label for='nidn'>NIDN</label>
                            <input type='text' wire:model='nidn' id='nidn' class='form-control'>
                            @error('nidn')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='nama_dosen'>Nama Dosen</label>
                            <input type='text' wire:model='nama_dosen' id='nama_dosen' class='form-control'>
                            @error('nama_dosen')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='jk'>Jenis Kelamin</label>
                            <select wire:model='jk' id='jk' class='form-control'>
                                <option value='-'>-- Pilih JK --</option>
                                <option value='L'>Laki-Laki</option>
                                <option value='P'>Perempuan</option>
                            </select>
                            @error('jk')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='foto_profile'>Foto Profile</label>
                            <input type='file' wire:model='foto_profile' id='foto_profile' class='form-control'>
                            @error('foto_profile')
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
                $('#jk').select2();

                $('#jk').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });
            });
        })
    </script>
@endpush
