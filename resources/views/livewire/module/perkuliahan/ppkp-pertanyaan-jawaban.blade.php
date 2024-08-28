<div>
    <div class="tw-ml-10"></div>
    <div class="tw-flex-grow tw-container tw-max-w-2xl tw-mx-auto lg:tw-mt-[-35px] tw-px-4 lg:tw-px-0">
        <div class="tw-mt-5" id="isi-catatan" style="font-family: 'Roboto', sans-serif;">
            <h1 class="tw-text-2xl tw-font-bold tw-text-blue-100">List Pertanyaan Jawaban</h1>
            <div class="tw-mt-5">
                <input type="search" class="tw-w-full form-control tw-bg-gray-900 tw-borders tw-border-gray-800">
            </div>
            <div class="tw-mt-5 tw-text-gray-100 tw-tracking-wide tw-leading-loose">
                @foreach ($data as $row)
                    <div class="tw-px-4 tw-py-3 tw-bg-gray-900 tw-rounded-md tw-mt-5">
                        <span class="!tw-tracking-normal !tw-text-cyan-400">{!! $row->pertanyaan !!}</span>
                        <p class="!tw-tracking-normal">{!! $row->jawaban !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
