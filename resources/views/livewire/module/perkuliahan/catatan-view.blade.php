<div>
    <div class="tw-ml-10"></div>
    <div class="tw-flex-grow tw-container tw-max-w-2xl tw-mx-auto lg:tw-mt-[-35px] tw-px-4 lg:tw-px-0">
        <p class="tw-text-sm tw-font-semibold">
            <span class="tw-text-blue-300">{{ $kode_matkul }} - {{ $nama_matkul }} ·</span>
            <span class="tw-text-gray-400">
                {{ \Carbon\Carbon::parse($tgl_dibuat)->isoFormat('dddd, D MMMM Y') }}</span>
        </p>
        <div class="tw-mt-5">
            <h1 class="tw-text-4xl tw-font-bold tw-text-blue-100">{{ $title }}</h1>
            {{-- <hr class="tw-mt-5 tw-mb-4 tw-border-t-2 w-[10%] lg:w-[4%] tw-border-gray-800" /> --}}
            <div class="tw-mt-10 tw-text-gray-200 tw-tracking-wide tw-leading-loose" id="isi-catatan">
                {!! $isi_catatan !!}
            </div>
        </div>
    </div>
</div>
