<x-layout>
    <header class="bg-slate-600 text-white">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="text-xl font-bold">SIAKAD</div>
            <div class="hidden md:flex space-x-4">
                <a href="#home" class="hover:text-slate-200">Home</a>
                <a href="#about" class="hover:text-slate-200">About</a>
                <a href="#ourteam" class="hover:text-slate-200">Our Team</a>
                <a href="#news" class="hover:text-slate-200">News</a>
            </div>
            <a href="/auth/login" class="bg-white text-slate-600 hover:bg-slate-100 px-4 py-2 rounded">Login</a>
        </nav>
    </header>

    <section id="home" class="bg-gray-100 py-20 h-screen flex justify-center items-center">
        <div class="container mx-auto px-6 grid grid-cols-2">
            <div class="flex justify-center items-center">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player src="https://lottie.host/0c7acab2-8abf-40df-ae74-3440f114d037/oDwQPPZV0j.lottie"
                    background="transparent" speed="1" style="width: 500px; height: 500px" loop
                    autoplay></dotlottie-player>
            </div>
            <div class="flex flex-col justify-center w-[70%]">
                <h1 class="text-3xl font-bold"><span class="text-blue-500">NEXT SIAKAD</span></h1>
                <h2 class="text-5xl font-bold">Universitas Trunojoyo Madura</h2>
                <p id="typing-text" class="text-xl"></p>
                <button class="bg-blue-500 text-white py-2 px-4 rounded-full w-1/4 mt-4">
                    <a href="/auth/login">Login</a>
                </button>
            </div>
        </div>
    </section>

    <section id="about" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-center">Tentang SIAKAD</h2>
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('images/about-siakad.jpg') }}" alt="About SIAKAD"
                        class="rounded-lg shadow-lg w-full">
                </div>
                <div class="w-full md:w-1/2 md:pl-10">
                    <p class="text-lg mb-4">SIAKAD adalah sistem informasi akademik yang dirancang untuk memudahkan
                        pengelolaan data akademik, mulai dari penjadwalan kuliah, pengelolaan nilai, hingga pelaporan
                        akademik.</p>
                    <p class="text-lg">Dengan SIAKAD, proses akademik menjadi lebih efisien, transparan, dan mudah
                        diakses oleh seluruh civitas akademika.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="ourteam" class="bg-gray-100 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-center">Tim Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <img src="{{ asset('images/team-member-' . $i . '.jpg') }}"
                            alt="Team Member {{ $i }}" class="rounded-full w-32 h-32 mx-auto mb-4">
                        <h3 class="text-xl font-semibold mb-2">Nama Anggota {{ $i }}</h3>
                        <p class="text-gray-600">Posisi Anggota</p>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section id="news" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-center">Berita Terkini</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('images/news-' . $i . '.jpg') }}" alt="News {{ $i }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Judul Berita {{ $i }}</h3>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#"
                                class="text-slate-600 hover:bg-slate-50 border border-slate-600 px-4 py-2 rounded inline-block">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <footer class="bg-slate-600 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} SIAKAD. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Sistem Informasi Akademik Terpadu untuk Pendidikan yang Lebih Baik",
                "Lebih baik dari SIAKAD",
                "Dibangun di atas Laravel"
            ];
            const typingText = document.getElementById('typing-text');
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let typingSpeed = 50;

            function typeWriter() {
                const currentText = texts[textIndex];

                if (!isDeleting && charIndex <= currentText.length) {
                    typingText.innerHTML = currentText.substring(0, charIndex);
                    charIndex++;
                    typingSpeed = 50;
                } else if (isDeleting && charIndex >= 0) {
                    typingText.innerHTML = currentText.substring(0, charIndex);
                    charIndex--;
                    typingSpeed = 25;
                } else {
                    isDeleting = !isDeleting;
                    if (!isDeleting) {
                        textIndex = (textIndex + 1) % texts.length;
                    }
                    typingSpeed = isDeleting ? 1000 : 500;
                }

                setTimeout(typeWriter, typingSpeed);
            }

            typeWriter();
        });
    </script>
</x-layout>

