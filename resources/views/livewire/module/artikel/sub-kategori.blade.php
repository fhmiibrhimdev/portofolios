<div>
    <section class="section custom-section">
        <div class="section-header">
            <h1>Sub Kategori</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <h3>Table Sub Kategori</h3>
                <div class="card-body">
                    <div class="show-entries">
                        <p class="show-entries-show">Show</p>
                        <select wire:model.live="lengthData" id="length-data">
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                        <p class="show-entries-entries">Entries</p>
                    </div>
                    <div class="search-column">
                        <p>Search: </p><input type="search" wire:model.live.debounce.750ms="searchTerm"
                            id="search-data" placeholder="Search here..." class="form-control" value="">
                    </div>
                    <div class="table-responsive tw-max-h-96">
                        <table class="tw-table-auto">
                            <thead class="tw-sticky tw-top-0">
                                <tr class="tw-text-gray-700">
                                    <th width="15%" class="tw-whitespace-nowrap">Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data->groupBy('nama_kategori') as $row)
                                    <tr>
                                        <td class="text-left tw-font-bold">{{ $row[0]['nama_kategori'] }}</td>
                                        <td colspan="3"></td>
                                    </tr>
                                    @foreach ($row as $item)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>{{ $item['nama_sub_kategori'] }}</td>
                                            <td>{{ $item['deskripsi'] }}</td>
                                            <td class="text-center">
                                                <button wire:click.prevent="edit({{ $item['id'] }})"
                                                    class="btn btn-primary" data-toggle="modal"
                                                    data-target="#formDataModal">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button wire:click.prevent="deleteConfirm({{ $item['id'] }})"
                                                    class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Not data available in the table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5 px-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <button wire:click.prevent="isEditingMode(false)" class="btn-modal" data-toggle="modal" data-backdrop="static"
            data-keyboard="false" data-target="#formDataModal">
            <i class="far fa-plus"></i>
        </button>
    </section>
    <div class="modal fade" wire:ignore.self id="formDataModal" aria-labelledby="formDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formDataModalLabel">{{ $isEditing ? 'Edit Data' : 'Add Data' }}</h5>
                    <button type="button" wire:click="cancel()" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_kategori">Nama Kategori</label>
                            <select wire:model="id_kategori" id="id_kategori" class="form-control">
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_sub_kategori">Nama Sub Kategori</label>
                            <input type="text" wire:model="nama_sub_kategori" id="nama_sub_kategori"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea wire:model="deskripsi" id="deskripsi" class="form-control" style="height: 100px"></textarea>
                        </div>
                        <input type="hidden" wire:model='gambar'>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="cancel()" class="btn btn-secondary tw-bg-gray-300"
                            data-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="{{ $isEditing ? 'update()' : 'store()' }}"
                            wire:loading.attr="disabled" class="btn btn-primary tw-bg-blue-500">Save Data</button>
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
                $('#id_kategori').select2();
                $('#id_kategori').on('change', function(e) {
                    var data = $('#id_kategori').select2("val");
                    @this.set('id_kategori', data);
                });
            });
        })
    </script>
@endpush
