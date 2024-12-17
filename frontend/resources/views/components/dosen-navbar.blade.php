@props([
  'token' => null,
  'teacher' => null
])

<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="{{ route('dosen.dashboard') }}" class="flex items-center justify-between mr-4">
                        <div class="text-2xl font-bold gradient-text animate-pulse-slow">Next Siakad</div>
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Dashboard Menu -->
                        <div class="relative">
                            <a href="{{ route('dosen.dashboard') }}" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <span class="ml-2">Dashboard Dosen</span>
                            </a>
                        </div>
                        <!-- Akademik Menu -->
                        <div class="relative">
                            <button onclick="toggleDropdown('akademik')" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                                </svg>
                                <span>Akademik</span>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="dropdown-akademik" class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="{{ route('dosen.jadwal') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jadwal Mengajar</a>
                                <a href="{{ route('dosen.daftar-matkul') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Daftar MK</a>
                                {{-- <a href="{{ route('dosen.materi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Materi</a> --}}
                                <a href="{{ route('dosen.perwalian') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Daftar Perwalian</a>
                                <a href="{{ route('dosen.validasi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Validasi KRS</a>
                            </div>
                        </div>
                        <!-- Absensi Menu -->
                        <div class="relative">
                            <button onclick="toggleDropdown('absensi')" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                                </svg>
                                <span>Absensi</span>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="dropdown-absensi" class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="{{ route('dosen.sivitas') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Absen</a>
                                <a href="{{ route('dosen.riwayat-absen') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Absen</a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="flex items-center lg:order-2">
                <!-- Profile dropdown -->
                <div class="relative">
                    <button onclick="toggleDropdown('profile')" class="flex items-center ml-4 px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ml-2">{{ $teacher['data']['name'] }}</span>
                    </button>
                    <div id="dropdown-profile" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                        <a href="{{ route('dosen.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data Pribadi</a>
                        <p id="sign-out" class="block w-full cursor-pointer text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const signOut = document.querySelector("#sign-out");
            if (signOut) {
                signOut.addEventListener("click", async () => {
                    try {
                        const tokenResponse = await axios.post("/token/get-token");
                        const token = tokenResponse.data;
                        if (!token) {
                            console.log("Token not found");
                            return;
                        }
                        console.log(token);
                        const response = await axios.patch("http://localhost:3000/api/teacher/logout", {}, {
                            headers: {
                                "X-API-TOKEN": token
                            }
                        });
                        if (response.status === 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: response.data.message,
                            })
                            const destroyTokenResponse = await axios.post("/token/destroy-token", {
                                token: token
                            });
                            if (destroyTokenResponse.status === 200) {
                                console.log("Token destroyed");
                                window.location.replace("/auth/login");
                            }
                        }
                    } catch (error) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: error.response?.data.message || error.message,
                        })
                    }
                });
            }
        });
    </script>
</nav>

<script>
    function toggleDropdown(menu) {
        const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
        dropdowns.forEach(dropdown => {
            if (dropdown.id !== `dropdown-${menu}`) {
                dropdown.classList.add('hidden');
            }
        });
        const dropdown = document.getElementById(`dropdown-${menu}`);
        dropdown.classList.toggle('hidden');
    }
</script>
