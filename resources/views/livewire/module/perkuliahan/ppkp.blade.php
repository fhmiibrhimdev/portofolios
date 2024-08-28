<div>
    <section class="section custom-section">
        <div class="section-header">
            <h1>PPKP</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <h3>Table PPKP</h3>
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
                            <thead class="tw-sticky tw-top-0 ">
                                <tr class="tw-text-gray-700">
                                    <th width="6%" class="text-center">No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th class="text-center"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{!! $row->pertanyaan !!}</td>
                                        <td>{!! $row->jawaban !!}</td>
                                        <td class="text-center">
                                            <button wire:click.prevent="edit({{ $row->id }})"
                                                class="btn btn-primary" data-toggle="modal"
                                                data-target="#formDataModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click.prevent="deleteConfirm({{ $row->id }})"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Not data available in the table</td>
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
                            <label for="pertanyaan">Pertanyaan</label>
                            <div wire:ignore>
                                <textarea wire:model="pertanyaan" id="pertanyaan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban">Jawaban</label>
                            <div wire:ignore>
                                <textarea wire:model="jawaban" id="jawaban" class="form-control"></textarea>
                            </div>
                        </div>
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
        window.addEventListener('initSummernote', event => {
            $(document).ready(function() {
                initializeSummernote('#pertanyaan', 'pertanyaan');
                initializeSummernote('#jawaban', 'jawaban');
            });
        })
    </script>
    <script>
        function initializeSummernote(selector, wiremodel) {
            $(selector).summernote('destroy')
            $(selector).summernote({
                height: 100,
                imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    removeEmpty: false,
                    disableUpload: false
                },
                popover: {
                    image: [
                        ['custom', ['imageAttributes']],
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatCenter', 'floatRight', 'floatNone']],
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
                        var containsPreHljs = /<pre\s+class="hljs"[^>]*>[^]*?<\/pre>/i.test(text);

                        if (containsPreHljs) {
                            document.execCommand('insertHTML', false, '<p>' + text + '</p>');
                        } else {
                            text = text.replace(/<([a-z]+)([^>]*)>/gi, function(match, p1, p2) {
                                return '<code>&lt;' + p1 + p2 + '&gt;</code>';
                            });
                            text = text.replace(/-([^\s]+?)-/g, function(match, p1) {
                                return '<span id="codeselector">' + p1 + '</span>';
                            });
                            text = text.replace(/-([^-]+?)-/g, function(match, p1) {
                                return '<span id="codeselector">' + p1 + '</span>';
                            });
                            document.execCommand('insertHTML', false, '<p>' + text + '</p>');
                        }
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
