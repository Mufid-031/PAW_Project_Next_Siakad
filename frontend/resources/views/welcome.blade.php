<x-layout>
    <header class="fixed w-full z-50 backdrop-blur-sm shadow-sm">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                NextSiakad</div>
            <div class="hidden md:flex space-x-8">
                <a href="#" data-section="home"
                    class="nav-link hover:text-blue-600 font-bold transition-colors">Home</a>
                <a href="#" data-section="about"
                    class="nav-link hover:text-blue-600 font-bold transition-colors">About</a>
                <a href="#" data-section="ourteam"
                    class="nav-link hover:text-blue-600 font-bold transition-colors">Our Team</a>
                <a href="#" data-section="news"
                    class="nav-link hover:text-blue-600 font-bold transition-colors">News</a>
            </div>
            <a href="/auth/login"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5">Login</a>
        </nav>
    </header>

    <section id="home" class="bg-gradient-to-br from-slate-50 to-blue-100 pt-32 pb-20 min-h-screen">
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="flex flex-col space-y-6 md:pr-12">
                <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                    <span class="bg-gradient-to-r from-indigo-600 to-blue-500 bg-clip-text text-transparent">Next
                        Generation</span>
                    <br>Academic System
                </h1>
                <p id="typing-text" class="text-xl text-gray-700"></p>
                <div class="flex space-x-4">
                    <a href="/auth/login"
                        class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white px-8 py-3 rounded-full hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5 inline-flex items-center">
                        Get Started
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-center">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player src="https://lottie.host/0c7acab2-8abf-40df-ae74-3440f114d037/oDwQPPZV0j.lottie"
                    background="transparent" speed="1" style="width: 600px; height: 600px" loop autoplay>
                </dotlottie-player>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm tracking-wider uppercase">Tentang Kami</span>
                <h2 class="text-4xl font-bold mt-2 mb-4">Kenapa Memilih NextSiakad?</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Platform manajemen akademik modern yang menghadirkan
                    kemudahan dan efisiensi dalam pengelolaan data pendidikan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Performa Tinggi</h3>
                    <p class="text-slate-600">Sistem ini telah dioptimalkan untuk memastikan responsivitas tinggi dan
                        waktu pemrosesan yang lebih cepat dan responsif untuk pengalaman pengguna yang optimal, bahkan
                        untuk volume data yang besar.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Keandalan dan Skalabilitas</h3>
                    <p class="text-slate-600">NextSiakad dirancang agar mudah diintegrasikan dengan sistem lain,
                        memastikan keandalan jangka panjang serta kemudahan pengembangan jika kampus ingin menambah
                        fitur baru di masa depan.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Desain UI/UX Modern</h3>
                    <p class="text-slate-600">NextSiakad dirancang dengan antarmuka pengguna yang intuitif dan estetis,
                        memastikan kemudahan navigasi dan kenyamanan bagi pengguna, baik mahasiswa, dosen, maupun admin.
                        Desain yang responsif juga menjadikannya optimal untuk berbagai perangkat.</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="w-full md:w-1/2 p-8 md:p-12">
                    <h3 class="text-3xl font-bold mb-6">Apa itu NextSiakad?</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <p class="text-slate-600 max-w-2xl mx-auto">NextSiakad adalah sistem informasi akademik yang
                                dirancang untuk memudahkan pengelolaan data akademik, mulai dari penjadwalan kuliah,
                                pengelolaan nilai, hingga pelaporan akademik. Dengan NextSiakad, proses akademik menjadi
                                lebih efisien, transparan, dan mudah diakses oleh seluruh civitas akademika.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('images/about.svg') }}" alt="About NextSiakad"
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section id="ourteam" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-xl shadow-lg p-8 text-center group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="relative overflow-hidden rounded-xl mb-6">
                        <img src="{{ asset('images/team-member-1.png') }}" alt="Team Member"
                            class="w-full object-cover transition duration-300 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-4">
                                <a href="#"
                                    class="bg-[#0077b5] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#1DA1F2] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#171515] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Imam Syafii</h3>
                    <p class="text-gray-600">Front-End Developer</p>
                    <p class="text-blue-600">Universitas Trunojoyo Madura</p>
                </div>
                <div
                    class="bg-white rounded-xl shadow-lg p-8 text-center group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="relative overflow-hidden rounded-xl mb-6">
                        <img src="{{ asset('images/team-member-1.png') }}" alt="Team Member"
                            class="w-full object-cover transition duration-300 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-4">
                                <a href="#"
                                    class="bg-[#0077b5] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#1DA1F2] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#171515] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Imam Syafii</h3>
                    <p class="text-gray-600">Front-End Developer</p>
                    <p class="text-blue-600">Universitas Trunojoyo Madura</p>
                </div>
                <div
                    class="bg-white rounded-xl shadow-lg p-8 text-center group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="relative overflow-hidden rounded-xl mb-6">
                        <img src="{{ asset('images/team-member-1.png') }}" alt="Team Member"
                            class="w-full object-cover transition duration-300 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-4">
                                <a href="#"
                                    class="bg-[#0077b5] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#1DA1F2] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-[#171515] p-2 rounded-full text-white hover:bg-opacity-80 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" role="img" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Imam Syafii</h3>
                    <p class="text-gray-600">Front-End Developer</p>
                    <p class="text-blue-600">Universitas Trunojoyo Madura</p>
                </div>
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
            <p>&copy; {{ date('Y') }} NextSiakad. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Mengubah Cara Pengelolaan Akademik Menjadi Lebih Efisien",
                "Sistem Informasi Akademik Modern dan Terintegrasi",
                "Solusi Terbaik untuk Manajemen Pendidikan",
                "Memudahkan Akses Informasi Akademik Dimana Saja"
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
                    typingSpeed = isDeleting ? 2000 : 500;
                }

                setTimeout(typeWriter, typingSpeed);
            }

            typeWriter();

            // Smooth scroll handling
            document.querySelectorAll('.nav-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sectionId = this.getAttribute('data-section');
                    const element = document.getElementById(sectionId);

                    if (element) {
                        element.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</x-layout>
