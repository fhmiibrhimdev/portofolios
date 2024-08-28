<div>
    <div class="tw-ml-10"></div>
    <div class="tw-flex-grow tw-container tw-max-w-2xl tw-mx-auto lg:tw-mt-[-70px] tw-px-4 lg:tw-px-0">
        <div class="tw-mt-5 tw-font-bold tw-text-center">
            @if ($id_sub_kategori == 0)
                <h1 class="tw-text-4xl">Artikel</h1>
            @endif
            <div class="tw-container tw-max-w-2xl tw-mx-auto tw-text-left">
                @if ($id_sub_kategori == 0)
                    @foreach ($data->groupBy('nama_kategori') as $row)
                        <p class="tw-mt-10 tw-mb-5">{{ $row[0]['nama_kategori'] }}</p>
                        <div class="tw-grid tw-grid-cols-2 lg:tw-grid-cols-4 tw-gap-4 ">
                            @foreach ($row as $item)
                                <a href="{{ url('articles/' . $item['nama_sub_kategori']) }}">
                                    <div
                                        class="tw-mb-2 tw-flex tw-bg-slate-950 tw-text-white tw-py-4 tw-px-4 tw-rounded-lg tw-border-2 tw-border-dashed tw-border-gray-800 hover:tw-border-cyan-700">
                                        <img src="{{ asset('/icons/' . $item['gambar']) }}"
                                            class="tw-rounded-lg tw-w-6 tw-mr-4" alt="">
                                        <h2 class="tw-text-base lg:tw-text-base">{{ $item['nama_sub_kategori'] }}</h2>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="tw-text-center">
                        <h1 class="tw-text-4xl tw-text-cyan-500">{{ $kategori }}</h1>
                        <p class="tw-mt-5 tw-mb-16 tw-font-medium">Artikel, tutorial dan topik tentang yang kamu cari
                        </p>
                    </div>
                    @forelse ($posts as $post)
                        <a href="{{ url('article/' . $post->slug) }}">
                            <div
                                class="tw-bg-slate-950 tw-text-white tw-py-4 tw-px-6 tw-rounded-lg tw-border-2 tw-border-dashed tw-border-gray-600 lg:tw-border-gray-900 hover:tw-border-cyan-800 tw-mt-2">
                                <h2 class="tw-text-sm lg:tw-text-base">{{ $post->judul }}</h2>
                            </div>
                        </a>
                    @empty
                        <div
                            class=" tw-bg-slate-950 tw-py-4 tw-px-6 tw-rounded-lg tw-border-2 tw-border-dashed tw-border-slate-800 tw-text-center">
                            <h2 class="tw-text-sm lg:tw-text-base tw-text-gray-400">Kami belum memiliki artikel untuk
                                kategori ini</h2>
                        </div>
                    @endforelse
                    <div class="tw-text-center tw-mt-20">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
