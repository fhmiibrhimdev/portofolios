<div>
    <section class='section custom-section'>
        <div class='section-header'>
            <h1>Semester</h1>
        </div>

        <div class='section-body'>
            <div class='card'>
                <h3>Tabel Semester</h3>
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
                        <table>
                            <thead class='tw-sticky tw-top-0'>
                                <tr class='tw-text-gray-700 text-center'>
                                    <th width='6%' class='text-center'>No</th>
                                    <th>Kode Semester</th>
                                    <th>Nama Semester</th>
                                    <th>Status</th>
                                    <th class='text-center'><i class='fas fa-cog'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class='text-center'>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $row->kode_semester }}</td>
                                        <td>{{ $row->nama_semester }}</td>
                                        <td>
                                            <div class="mt-1">
                                                @if ($row->status == '1')
                                                    <button wire:click.prevent="active({{ $row->id }}, '0')"
                                                        wire:key="{{ rand() }}">
                                                        <label class="switch">
                                                            <input type="checkbox" checked>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </button>
                                                @else
                                                    <button wire:click.prevent="active({{ $row->id }}, '1')"
                                                        wire:key="{{ rand() }}">
                                                        <label class="switch">
                                                            <input type="checkbox">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
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
                                        <td colspan='5' class='text-center'>No data available in the table</td>
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
                            <label for='kode_semester'>Kode Semester</label>
                            <input type='text' wire:model='kode_semester' id='kode_semester' class='form-control'>
                            @error('kode_semester')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='nama_semester'>Nama Semester</label>
                            <input type='text' wire:model='nama_semester' id='nama_semester' class='form-control'>
                            @error('nama_semester')
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
@endpush

@push('js-libraries')
@endpush

@push('scripts')
@endpush
