<div>
    <section class='section custom-section'>
        <div class='section-header'>
            <h1>Tugas</h1>
        </div>

        <div class='section-body'>
            <div class='card'>
                <h3>Tabel Tugas</h3>
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
                    <div class='table-responsive tw-max-h-96 no-scrollbar'>
                        <table class="tw-w-[350%] lg:tw-w-[130%] tw-table-auto">
                            <thead class='tw-sticky tw-top-0'>
                                <tr class='tw-text-gray-700 tw-whitespace-nowrap'>
                                    <th width='1%' class='text-center'>No</th>
                                    <th>Judul Tugas</th>
                                    <th>DEADLINE</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Mata Kuliah</th>
                                    <th class='text-center'><i class='fas fa-cog'></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr class='text-center'>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class='text-left tw-w-[20%]'>
                                            {{ $row->judul_tugas }}</td>
                                        <td class='text-left tw-whitespace-nowrap'>
                                            {{ \Carbon\Carbon::parse($row->tgl_deadline)->isoFormat('dddd, D MMMM Y') }}
                                        </td>
                                        <td class='text-left tw-whitespace-nowrap'>
                                            @if ($row->kategori == 'Tugas')
                                                <span
                                                    class="tw-bg-red-50 tw-text-xs tw-tracking-wider tw-text-red-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Pembelajaran')
                                                <span
                                                    class="tw-bg-yell`ow-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Ujian')
                                                <span
                                                    class="tw-bg-blue-50 tw-text-xs tw-tracking-wider tw-text-blue-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Quis')
                                                <span
                                                    class="tw-bg-orange-50 tw-text-xs tw-tracking-wider tw-text-orange-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Project')
                                                <span
                                                    class="tw-bg-green-50 tw-text-xs tw-tracking-wider tw-text-green-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Pekerjaan')
                                                <span
                                                    class="tw-bg-purple-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @elseif ($row->kategori == 'Pertemuan')
                                                <span
                                                    class="tw-bg-indigo-50 tw-text-xs tw-tracking-wider tw-text-indigo-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->kategori }}</span>
                                            @else
                                            @endif

                                        </td>
                                        <td class='text-left tw-overflow-hidden tw-text-ellipsis tw-w-[30%]'
                                            onclick="toggleText(this)" data-full-text="{{ $row->deskripsi }}">
                                            {!! Str::limit($row->deskripsi, 100, '...') !!}
                                        </td>
                                        <td class='text-left tw-whitespace-nowrap'>
                                            @if ($row->tipe == 'Kuliah')
                                                <span
                                                    class="tw-bg-sky-50 tw-text-xs tw-tracking-wider tw-text-sky-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->tipe }}</span>
                                            @elseif ($row->tipe == 'Organisasi')
                                                <span
                                                    class="tw-bg-rose-50 tw-text-xs tw-tracking-wider tw-text-rose-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->tipe }}</span>
                                            @elseif ($row->tipe == 'Personal')
                                                <span
                                                    class="tw-bg-amber-50 tw-text-xs tw-tracking-wider tw-text-amber-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->tipe }}</span>
                                            @elseif ($row->tipe == 'Lomba')
                                                <span
                                                    class="tw-bg-lime-50 tw-text-xs tw-tracking-wider tw-text-lime-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                                                    {{ $row->tipe }}</span>
                                            @endif
                                        </td>
                                        <td class='text-left tw-whitespace-nowrap'>
                                            @if ($row->status == 'Belum')
                                                <span
                                                    class="tw-bg-red-50 tw-text-xs tw-tracking-wider tw-text-red-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                                        class="fas fa-times"></i>
                                                    {{ $row->status }}</span>
                                            @elseif ($row->status == 'Sedang Berlangsung')
                                                <span
                                                    class="tw-bg-purple-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                                        class="fas fa-spinner"></i>
                                                    Berlangsung</span>
                                            @elseif ($row->status == 'Selesai')
                                                <span
                                                    class="tw-bg-green-50 tw-text-xs tw-tracking-wider tw-text-green-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                                        class="fas fa-check"></i>
                                                    {{ $row->status }}</span>
                                            @endif
                                        </td>
                                        <td class='text-left tw-whitespace-nowrap'>{{ $row->nama_matkul }}</td>
                                        <td class="tw-whitespace-nowrap">
                                            <button wire:click.prevent='detail({{ $row->id }})'
                                                class='btn btn-info' data-toggle='modal' data-target='#detailModal'>
                                                <i class='fas fa-eye'></i>
                                            </button>
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
                                        <td colspan='10' class='text-center'>No data available in the table</td>
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
                            <label for='id_matkul'>Mata Kuliah</label>
                            <div wire:ignore>
                                <select wire:model='id_matkul' id='id_matkul' class='form-control'>
                                    <option value=''>-- Pilih Matkul</option>
                                    @foreach ($matkuls as $matkul)
                                        <option value='{{ $matkul->id }}'>{{ $matkul->kode_matkul }} -
                                            {{ $matkul->nama_matkul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_matkul')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class='form-group'>
                                    <label for='tgl'>Tanggal</label>
                                    <input type='date' wire:model='tgl' id='tgl' class='form-control'>
                                    @error('tgl')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class='form-group'>
                                    <label for='tgl_deadline'>Tanggal Deadline</label>
                                    <input type='date' wire:model='tgl_deadline' id='tgl_deadline'
                                        class='form-control'>
                                    @error('tgl_deadline')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class='form-group'>
                                    <label for='kategori'>Kategori</label>
                                    <div wire:ignore>
                                        <select wire:model='kategori' id='kategori' class='form-control select2'>
                                            <option value=''>-- Pilih Kategori --</option>
                                            <option value='Tugas'>Tugas</option>
                                            <option value='Pembelajaran'>Pembelajaran</option>
                                            <option value='Ujian'>Ujian</option>
                                            <option value='Quis'>Quis</option>
                                            <option value='Project'>Project</option>
                                            <option value='Pekerjaan'>Pekerjaan</option>
                                            <option value='Pertemuan'>Pertemuan</option>
                                        </select>
                                    </div>
                                    @error('kategori')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class='form-group'>
                                    <label for='tipe'>Tipe</label>
                                    <div wire:ignore>
                                        <select wire:model='tipe' id='tipe' class='form-control select2'>
                                            <option value=''>-- Pilih Tipe --</option>
                                            <option value='Kuliah'>Kuliah</option>
                                            <option value='Organisasi'>Organisasi</option>
                                            <option value='Personal'>Personal</option>
                                            <option value='Lomba'>Lomba</option>
                                        </select>
                                    </div>
                                    @error('tipe')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class='form-group'>
                                    <label for='status'>Status</label>
                                    <div wire:ignore>
                                        <select wire:model='status' id='status' class='form-control select2'>
                                            <option value=''>-- Pilih Status --</option>
                                            <option value='Selesai'>Selesai</option>
                                            <option value='Sedang Berlangsung'>Sedang Berlangsung</option>
                                            <option value='Belum'>Belum</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='judul_tugas'>Judul Tugas</label>
                            <input type='text' wire:model='judul_tugas' id='judul_tugas' class='form-control'>
                            @error('judul_tugas')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='deskripsi'>Deskripsi</label>
                            <div wire:ignore>
                                <textarea wire:model='deskripsi' id='deskripsi' class='form-control' style='height: 100px !important;'></textarea>
                            </div>
                            @error('deskripsi')
                                <small class='text-danger'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='jawaban'>Jawaban</label>
                            <div wire:ignore>
                                <textarea wire:model='jawaban' id='jawaban' class='form-control' style='height: 100px !important;'></textarea>
                            </div>
                            @error('jawaban')
                                <small class='text-danger'>{{ $message }}</small>
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

    <div class="modal fade" wire:ignore.self id="detailModal" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg tw-fixed tw-top-0 tw-right-0 tw-h-full tw-m-0">
            <div class="modal-content tw-rounded-none tw-overflow-y-auto tw-h-screen">
                <div class="modal-header tw-px-4">
                    <h5 class="modal-title tw-font-semibold tw-text-gray-800" id="detailModalLabel">
                        {{ $judul_tugas }}</h5>
                    <button type="button" wire:click="cancel()" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="tw-px-4 tw-mt-1 tw-mb-2 tw-text-xs">
                    <span>Deadline: {{ \Carbon\Carbon::parse($tgl_deadline)->isoFormat('dddd, D MMMM Y') }}</span>
                </div>
                <div class="tw-px-4 tw-flex tw-space-x-2 mb-2">
                    @if ($kategori == 'Tugas')
                        <span
                            class="tw-bg-red-50 tw-text-xs tw-tracking-wider tw-text-red-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Pembelajaran')
                        <span
                            class="tw-bg-yell`ow-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Ujian')
                        <span
                            class="tw-bg-blue-50 tw-text-xs tw-tracking-wider tw-text-blue-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Quis')
                        <span
                            class="tw-bg-orange-50 tw-text-xs tw-tracking-wider tw-text-orange-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Project')
                        <span
                            class="tw-bg-green-50 tw-text-xs tw-tracking-wider tw-text-green-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Pekerjaan')
                        <span
                            class="tw-bg-purple-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @elseif ($kategori == 'Pertemuan')
                        <span
                            class="tw-bg-indigo-50 tw-text-xs tw-tracking-wider tw-text-indigo-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $kategori }}</span>
                    @else
                    @endif

                    @if ($tipe == 'Kuliah')
                        <span
                            class="tw-bg-sky-50 tw-text-xs tw-tracking-wider tw-text-sky-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $tipe }}</span>
                    @elseif ($tipe == 'Organisasi')
                        <span
                            class="tw-bg-rose-50 tw-text-xs tw-tracking-wider tw-text-rose-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $tipe }}</span>
                    @elseif ($tipe == 'Personal')
                        <span
                            class="tw-bg-amber-50 tw-text-xs tw-tracking-wider tw-text-amber-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $tipe }}</span>
                    @elseif ($tipe == 'Lomba')
                        <span
                            class="tw-bg-lime-50 tw-text-xs tw-tracking-wider tw-text-lime-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1">
                            {{ $tipe }}</span>
                    @endif

                    @if ($status == 'Belum')
                        <span
                            class="tw-bg-red-50 tw-text-xs tw-tracking-wider tw-text-red-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                class="fas fa-times"></i>
                            {{ $status }}</span>
                    @elseif ($status == 'Sedang Berlangsung')
                        <span
                            class="tw-bg-purple-50 tw-text-xs tw-tracking-wider tw-text-purple-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                class="fas fa-spinner"></i>
                            Berlangsung</span>
                    @elseif ($status == 'Selesai')
                        <span
                            class="tw-bg-green-50 tw-text-xs tw-tracking-wider tw-text-green-600 tw-px-2.5 tw-py-1.5 tw-rounded-tl-md tw-rounded-r-md tw-font-semibold mt-1"><i
                                class="fas fa-check"></i>
                            {{ $status }}</span>
                    @endif
                </div>
                <form>
                    <div class="modal-body  tw-tracking-normal tw-px-0">
                        <div class="tw-px-4">
                            <p
                                class="tw-text-gray-700 tw-text-lg lg:tw-text-base tw-tracking-wider tw-font-semibold tw-mb-3">
                                Pertanyaan:
                            </p>
                            <span
                                class="tw-text-gray-600 tw-text-base tw-leading-loose lg:tw-text-sm">{!! $deskripsi !!}</span>
                        </div>
                        <div
                            class="mt-3 tw-bg-gray-50 tw-px-4 tw-py-4 tw-border-2 tw-border-gray-300 tw-border-dashed">
                            <p
                                class="tw-text-gray-700 tw-text-lg lg:tw-text-base tw-tracking-wider tw-mb-3 tw-font-semibold">
                                Jawaban:
                            </p>
                            <span class="tw-text-gray-600 tw-text-base lg:tw-text-sm">{!! $jawaban !!}</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('general-css')
    <link href="{{ asset('assets/midragon/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/summernote/summernote-list-styles-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/katex/katex.min.css') }}">
@endpush

@push('js-libraries')
    <script src="{{ asset('/assets/midragon/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote-math.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote-list-styles-bs4.js') }}"></script>
    <script src="{{ asset('assets/katex/katex.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        function toggleText(element) {
            const fullText = element.getAttribute('data-full-text');
            const limitedText = element.dataset.limitedText || element.innerHTML;

            if (element.innerHTML.trim() === limitedText.trim()) {
                element.innerHTML = fullText;
                element.dataset.limitedText = limitedText;
            } else {
                element.innerHTML = limitedText;
            }
        }
    </script>
    <script>
        window.addEventListener('initSelect2', event => {
            $(document).ready(function() {
                $('#id_matkul').select2();
                $('#id_matkul').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });

                $('#kategori').select2();
                $('#kategori').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });

                $('#tipe').select2();
                $('#tipe').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });

                $('#status').select2();
                $('#status').on('change', function(e) {
                    var id = $(this).attr('id');
                    var data = $(this).select2("val");
                    @this.set(id, data);
                });
            });
        })
        window.addEventListener('initSummernote', event => {
            $(document).ready(function() {
                initializeSummernote('#deskripsi', 'deskripsi');
                initializeSummernote('#jawaban', 'jawaban');
            });
        })
    </script>
    <script>
        function initializeSummernote(selector, wiremodel) {
            $(selector).summernote('destroy')
            $(selector).summernote({
                height: 50,
                imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    removeEmpty: false,
                    disableUpload: false
                },
                popover: {
                    image: [
                        ['custom', ['imageAttributes']],
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'listStyles', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'math']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                grid: {
                    wrapper: "row",
                    columns: [
                        "col-md-12",
                        "col-md-6",
                        "col-md-4",
                        "col-md-3",
                        "col-md-24",
                    ]
                },
                callbacks: {
                    onImageUpload: function(image) {
                        sendFile(image[0], selector);
                    },
                    onMediaDelete: function(target) {
                        deleteFile(target[0].src)
                    },
                    onBlur: function() {
                        const contents = $(selector).summernote('code');
                        if (contents === '' || contents === '<br>' || !contents.includes('<p>')) {
                            $(selector).summernote('code', '<p>' + contents + '</p>');
                        }
                        @this.set(wiremodel, contents)
                    },
                    onPaste: function(e) {
                        e.preventDefault();
                        var clipboardData = (e.originalEvent || e).clipboardData;
                        var text = clipboardData.getData('text/plain');
                        document.execCommand('insertHTML', false, '<p>' + text + '</p>');
                    },
                    onInit: function() {
                        let currentContent = @this.get(wiremodel);
                        if (!currentContent) {
                            currentContent = '<p>Teks</p>'; // Paragraf default kosong
                        }
                        @this.set(wiremodel, currentContent)
                        $(selector).summernote('code', currentContent);
                    }
                },
                icons: {
                    grid: "bi bi-grid-3x2"
                },
            });
        }
    </script>
    <script>
        function sendFile(file, editor, welEditable) {
            token = "{{ csrf_token() }}"
            data = new FormData();
            data.append("file", file);
            data.append('_token', token);
            $('#loading-image-summernote').show();
            $(editor).summernote('disable');
            $.ajax({
                data: data,
                type: "POST",
                url: "{{ url('/summernote/file/upload') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    console.log(url);
                    if (url['status'] == "success") {
                        $(editor).summernote('enable');
                        $('#loading-image-summernote').hide();
                        $(editor).summernote('editor.saveRange');
                        $(editor).summernote('editor.restoreRange');
                        $(editor).summernote('editor.focus');
                        $(editor).summernote('editor.insertImage', url['image_url']);
                    }
                    $("img").addClass("img-fluid");
                },
                error: function(data) {
                    console.log(data)
                    $(editor).summernote('enable');
                    $('#loading-image-summernote').hide();
                }
            });
        }

        function deleteFile(target) {
            token = "{{ csrf_token() }}"
            data = new FormData();
            data.append("target", target);
            data.append('_token', token);
            $('#loading-image-summernote').show();
            $('.summernote').summernote('disable');
            $.ajax({
                data: data,
                type: "POST",
                url: "{{ url('/summernote/file/delete') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    console.log(result)
                    if (result['status'] == "success") {
                        $('.summernote').summernote('enable');
                        $('#loading-image-summernote').hide();
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Gambar berhasil dihapus.',
                            icon: 'success',
                        })
                    }
                },
                error: function(data) {
                    console.log(data)
                    $('.summernote').summernote('enable');
                    $('#loading-image-summernote').hide();
                }
            });
        }
    </script>
@endpush
