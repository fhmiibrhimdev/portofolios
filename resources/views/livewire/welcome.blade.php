<div>
    <div class="tw-flex-grow tw-container tw-max-w-7xl tw-mx-auto">
        <div class="tw-grid tw-grid-cols-1 tw-px-4 tw-gap-10 lg:tw-grid-cols-3 lg:tw-px-0">
            <div class="tw-col-span-2">
                <p class="tw-text-lg tw-text-cyan-300">Hello Everyone, I am</p>
                <div id="typing-effect"
                    class="tw-text-2xl tw-h-16 lg:tw-h-8 tw-font-bold tw-mt-2 tw-leading-relaxed tw-tracking-wide"></div>
                <p class="tw-mt-10 tw-text-sm lg:tw-text-base tw-text-gray-300 tw-leading-relaxed tw-tracking-wide">
                    Software Engineer with experience in developing applications integrated with IoT hardware. Adept in
                    application design, server-side development, and technical problem-solving.

                    Committed to continuous learning and innovation, with a passion for tackling new challenges in the
                    tech industry.
                </p>
                <div class="tw-mt-10 tw-flex">
                    <a href="{{ url('/articles') }}"
                        class="tw-bg-white tw-px-4 tw-py-2 tw-rounded-full tw-text-black tw-text-sm">
                        Let's Explore
                    </a>
                    <a href="{{ asset('images/CV_Fahmi_Ibrahim.pdf') }}" class="tw-px-4 tw-py-2 tw-text-sm">
                        <i class="fas fa-download tw-mr-2"></i> My Resume
                    </a>
                </div>
            </div>
            <div class="tw-hidden md:tw-hidden lg:tw-block">
                <div class="tw-ml-20">
                    <img class="tw-w-12/12 tw-rounded-full" src="{{ asset('icons/my-photo2.png') }}" alt="">
                    {{-- <div class=" tw-z-40">
                        <div class="tw-bg-gray-900 tw-w-80 tw-h-80 tw-rounded-full tw-opacity-20"></div>
                        <div class="tw-bg-gray-900 tw-w-64 tw-h-64 tw-rounded-full tw-opacity-20 tw-ml-8 tw-mt-[-290px]"></div>
                        <div class="tw-bg-gray-900 tw-w-48 tw-h-48 tw-rounded-full tw-opacity-20 tw-ml-16 tw-mt-[-225px]"></div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="tw-mt-16 tw-px-4 md:tw-px-4 lg:tw-mt-20 lg:tw-px-0">
            <h4 class="tw-mt-3 tw-text-lg lg:tw-text-xl tw-font-medium tw-leading-6 tw-text-cyan-300">
                Work Experience
            </h4>
            <div class="tw-flex tw-items-start tw-mt-8">
                <img src="{{ asset('icons/Intek.png') }}" class="tw-w-14 lg:tw-w-20 tw-rounded-full tw-mr-5 mt-[-10px]"
                    alt="">
                <div>
                    <p class="tw-font-medium tw-text-base lg:tw-text-lg">RnD - Mekatronika</p>
                    <p class="tw-text-sm tw-text-gray-300 tw-mt-1">
                        <a href="https://intek.co.id/id/" target="_blank">
                            PT. Solusi Intek Indonesia
                        </a>
                        • 3 June 2022 - 10 February 2024 • 1year 9mon
                    </p>
                    <div class="tw-flex tw-items-center tw-text-sm tw-text-cyan-300 tw-mt-5">
                        <button class="tw-mr-2" id="see-more">See More </button>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="tw-text-gray-300 tw-ml-16 lg:tw-ml-24 tw-text-[13px] lg:tw-text-sm" style="display: none;"
                id="description-see-more">
                <ul class="tw-list-disc tw-mt-3 tw-space-y-2">
                    <li>Contributed to IoT research and development.</li>
                    <li>Managed server maintenance, domain administration, application development, and database
                        optimization.</li>
                    <li>Handled hardware, software, and network troubleshooting.</li>
                    <li>Performed version control and documentation. </li>
                    <li>Developed electronic circuits, soldered components, and programmed microcontrollers.</li>
                </ul>
            </div>
        </div>
        <div class="tw-mt-16 tw-px-4 md:tw-px-4 lg:tw-mt-20 lg:tw-px-0">
            <h4 class="tw-mt-3 tw-text-lg lg:tw-text-xl tw-font-medium tw-leading-6 tw-text-cyan-300">
                Technology
            </h4>
            <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-y-10 lg:tw-grid-cols-6 lg:tw-gap-x-20 tw-mt-7">
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">Languages</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/HTML5.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>HTML5</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/CSS3.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>CSS 3</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/JavaScript.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>JavaScript</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/php.svg') }}" class="tw-rounded-lg tw-w-6 tw-mr-4" alt="">
                            <span>PHP</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Python.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>Python</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Dart.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>Dart</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Cplusplus.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>C++ Arduino</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">Databases</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/MySQL.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>MySQL</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/MariaDB.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>MariaDB</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">JavaScript Library</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <!-- <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/ReactJS.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4" alt="">
                            <span>ReactJS</span>
                        </li> -->
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/NodeJS.svg') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>NodeJS</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">Frameworks</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Laravel.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>Laravel</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Flutter.png') }}" class="tw-rounded-lg tw-w-5 tw-mr-5"
                                alt="">
                            <span>Flutter</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/TailwindCSS.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>TailwindCSS</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Bootstrap.png') }}" class="tw-rounded-lg tw-w-7 tw-mr-3"
                                alt="">
                            <span>Bootstrap</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">Microcontrollers</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Arduino.png') }}" class="tw-rounded-lg tw-w-5 tw-mr-5"
                                alt="">
                            <span>Arduino</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/ESP8266.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>ESP8266</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/ESP32.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>ESP32</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="tw-text-gray-300 tw-font-medium tw-text-base tw-mb-5">Others</p>
                    <ul id="tech-stack" class="tw-space-y-5 tw-p-0">
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/jQuery.png') }}" class="tw-rounded-lg tw-w-5 tw-mr-5"
                                alt="">
                            <span>jQuery</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Github.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>GitHub</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/Postman.svg') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>Postman</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/EasyEDA.jpg') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>EasyEDA</span>
                        </li>
                        <li class="tw-flex tw-items-center">
                            <img src="{{ asset('icons/MQTT.png') }}" class="tw-rounded-lg tw-w-6 tw-mr-4"
                                alt="">
                            <span>MQTT</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tw-mt-16 tw-px-4 md:tw-px-4 lg:tw-mt-20 lg:tw-px-0">
            <h4 class="tw-mt-3 tw-text-lg lg:tw-text-xl tw-font-medium tw-leading-6 tw-text-cyan-300">
                Credentials
            </h4>
            <div class="tw-flex tw-items-start tw-mt-10">
                <img src="{{ asset('icons/Udemy.jpg') }}"
                    class="tw-w-16 tw-h-16 lg:tw-w-20 lg:tw-h-20 tw-rounded-full" alt="">
                <div class="tw-ml-4 tw-mt-1">
                    <h4 class="tw-text-base lg:tw-text-lg">NodeJS Course PZN <a
                            href="{{ asset('images/NodeJS_Course_Udemy.jpg') }}" target="_BLANK"><i
                                class="fas fa-external-link tw-ml-3 tw-text-sm lg:tw-text-base tw-text-gray-400"></i></a>
                    </h4>
                    <p class="tw-text-gray-400 tw-mt-2">Udemy • August 2023 • No Expired
                    </p>
                </div>
            </div>
            <div class="tw-flex tw-items-start tw-mt-7">
                <img src="{{ asset('icons/Intek.png') }}" class="tw-w-16 lg:tw-w-20 tw-rounded-full" alt="">
                <div class="tw-ml-4 tw-mt-3">
                    <h4 class="tw-text-base lg:tw-text-lg">Divisi Mekatronika - Magang <a
                            href="{{ asset('images/Sertifikat_PT_Solusi_Intek.pdf') }}" target="_BLANK"><i
                                class="fas fa-external-link tw-ml-3 tw-text-sm lg:tw-text-base tw-text-gray-400"></i></a>
                    </h4>
                    <p class="tw-text-gray-400 tw-mt-2">PT. Solusi Intek Indonesia • May 2023 • No Expired
                    </p>
                </div>
            </div>
            <div class="tw-flex tw-items-start tw-mt-7">
                <img src="{{ asset('icons/SMKN5.png') }}"
                    class="tw-w-16 tw-h-16 lg:tw-ml-0 tw-ml-2 lg:tw-w-20 lg:tw-h-20 tw-rounded-full" alt="">
                <div class="tw-ml-4 tw-mt-0">
                    <h4 class="tw-text-base lg:tw-text-lg">SMKN 5 JAKARTA <a
                            href="{{ asset('images/Sertifikat_SMKN5JKT.pdf') }}" target="_BLANK"><i
                                class="fas fa-external-link tw-ml-3 tw-text-sm lg:tw-text-base tw-text-gray-400"></i></a>
                    </h4>
                    <p class="tw-text-gray-400 tw-mt-2 ">SMKN 5 Jakarta • May 2023 • May
                        2023 - May 2026</p>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        const seeMoreText = document.getElementById('see-more');
        const descriptionSeeMore = document.getElementById('description-see-more');

        seeMoreText.addEventListener('click', () => {
            if (descriptionSeeMore.style.display === "none") {
                descriptionSeeMore.style.display = "block";
            } else {
                descriptionSeeMore.style.display = "none";
            }
        })
    </script>
    <script>
        const textElement = document.getElementById('typing-effect');
        const textsToType = [
            "Fahmi Ibrahim",
            "Software Enginner",
            "Studying at Politeknik Negeri Jakarta."
        ];
        let currentTextIndex = 0;

        function typeText(text, delay) {
            let index = 0;
            const typingInterval = setInterval(function() {
                textElement.textContent += text[index];
                index++;

                if (index === text.length) {
                    clearInterval(typingInterval);
                    setTimeout(function() {
                        eraseText(text, delay);
                    }, 1000); // Jeda sebelum menghapus teks
                }
            }, delay);
        }

        function eraseText(text, delay) {
            const erasingInterval = setInterval(function() {
                textElement.textContent = textElement.textContent.slice(0, -1);

                if (textElement.textContent === '') {
                    clearInterval(erasingInterval);
                    currentTextIndex = (currentTextIndex + 1) % textsToType.length; // Ganti ke teks berikutnya
                    setTimeout(function() {
                        typeText(textsToType[currentTextIndex], delay);
                    }, 500); // Jeda sebelum mengetik ulang
                }
            }, delay / 2);
        }

        // Memulai efek tulisan mengetik pertama kali
        typeText(textsToType[currentTextIndex], 100);
    </script>
@endpush
