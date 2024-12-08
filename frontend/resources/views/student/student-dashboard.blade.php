{{-- {{ dd($student) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Bagian Header -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800">
                        Selamat Datang {{ $student['data']['name'] }}
                    </h1>
                </div>

                <!-- Konten Utama -->
                <div class="text-center">
                    <p class="text-gray-600 mb-4">
                        Selamat Datang di Portal Akademik. Portal Akademik adalah sistem yang memungkinkan para civitas akademika Universitas ... untuk menerima informasi dengan lebih cepat melalui Internet. Sistem ini diharapkan dapat memberi kemudahan setiap civitas akademika untuk melakukan aktivitas-aktivitas akademik dan proses belajar mengajar. Selamat menggunakan fasilitas ini.
                    </p>
                </div>

                <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-5">
                <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Nilai IPK</p>
                            <h3 class="text-2xl font-bold">3.85</h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                </div>
                <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Credits Completed</p>
                            <h3 class="text-2xl font-bold">98/144</h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                </div>
                <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Attendance Rate</p>
                            <h3 class="text-2xl font-bold">95%</h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                </div>
                <div class="bg-white/90 backdrop-blur-sm rounded-lg shadow-lg p-6 hover-scale">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Mata Kuliah Aktif</p>
                            <h3 class="text-2xl font-bold">6</h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Quick Access Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-3">
                <!-- Email -->
                <div class="group bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        <div class="text-white">
                            <a href="#"><h3 class="text-xl font-semibold">Email</h3></a>
                            <p class="text-blue-100">3 unread messages</p>
                        </div>
                    </div>
                </div>

                <!-- Academic -->
                <div class="group bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                        </svg>
                        <div class="text-white">
                            <a href="/student/grade"><h3 class="text-xl font-semibold">Nilai</h3></a>
                            <p class="text-emerald-100">Melihat Transkip Nilai</p>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="group bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                        </svg>
                        <div class="text-white">
                            <a href="/student/sivitas"><h3 class="text-xl font-semibold">Sivitas</h3></a>
                            <p class="text-purple-100">Akses Sivitas</p>
                        </div>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="group bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <div class="text-white">
                            <a href="/student/jadwal"><h3 class="text-xl font-semibold">Jadwal</h3></a>
                            <p class="text-orange-100">Melihat Jadwal-Kuliah</p>
                        </div>
                    </div>
                </div>

                <!-- Library -->
                <div class="group bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                        </svg>
                        <div class="text-white">
                            <a href="#"><h3 class="text-xl font-semibold">Perpustakaan</h3></a>
                            <p class="text-pink-100">Akses Perpustakaan</p>
                        </div>
                    </div>
                </div>

                <!-- Alumni -->
                <div class="group bg-gradient-to-br from-blue-700 to-blue-800 rounded-lg shadow-lg p-6 hover-scale cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white transform group-hover:rotate-12 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        <div class="text-white">
                            <a href="#"><h3 class="text-xl font-semibold">Alumni</h3></a>
                            <p class="text-blue-100">Daftar alumni</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- Loading Script -->
        <script>
            window.addEventListener('load', function() {
                const loader = document.getElementById('loader');
                loader.style.display = 'none';
            });

            // Navbar Scroll Effect
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white/95', 'shadow-md');
                    navbar.classList.remove('bg-white/90');
                } else {
                    navbar.classList.remove('bg-white/95', 'shadow-md');
                    navbar.classList.add('bg-white/90');
                }
            });

            // Add animation classes to elements on scroll
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.hover-scale').forEach((element) => {
                observer.observe(element);
            });
        </script>
    </x-layout>
</x-student-layout>
