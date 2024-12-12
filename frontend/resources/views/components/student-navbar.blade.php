@props([
    'token' => null,
    'student' => null
])

<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="../student/dashboard" class="flex items-center justify-between mr-4">
                        <div class="text-2xl font-bold gradient-text animate-pulse-slow">NextSiakad</div>
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Dashboard Menu -->
                        <div class="relative">
                            <a href="/student/dashboard" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <span class="ml-2">Dashboard</span>
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
                                <a href="/student/krs" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kartu Rencana Studi</a>
                                <a href="/student/jadwal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Jadwal Mata Kuliah</a>
                                <a href="/student/khs" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hasil Studi</a>
                                <a href="/student/grade" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Transkip Nilai</a>
                                <a href="/student/sivitas" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sivitas</a>
                            </div>
                        </div>
                        <!-- Keuangan Menu -->
                        <div class="relative">
                            <button onclick="toggleDropdown('keuangan')" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18a2 2 0 012 2v8a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2zm2 4h14m-6 4h.01" />
                                </svg>
                                <span class="ml-2">Keuangan</span>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="dropdown-keuangan" class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="/student/payment/status" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Status Pembayaran</a>
                                <a href="/student/payment" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pembayaran</a>
                                <a href="/student/beasiswa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Beasiswa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center lg:order-2">
                <!-- Profile dropdown -->
                <div class="relative">
                    <button onclick="toggleDropdown('profile')" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 border border-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ml-2">{{ $student['data']['name'] }}</span>
                    </button>
                    <div id="dropdown-profile" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                        <a href="/student/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data Pribadi</a>
                        <button id="sign-out" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const adminLogout = document.querySelector('#sign-out');
        adminLogout.addEventListener('click', async () => {
            try {
                const token = await axios.post('/token/get-token').then(res => res.data);
                const response = await axios.patch('http://localhost:3000/api/student/logout', {}, {
                    headers: {
                        'X-API-TOKEN': token
                    }
                }).then(data => data.data);
                if (response.status === 200) {
                    await axios.post('/token/destroy-token');
                    window.location.replace('http://127.0.0.1:8000/auth/login');
                }
            } catch (error) {
                console.log(error)
            }
        });
    </script>

    {{-- <script>
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
                        const response = await axios.patch("http://localhost:3000/api/admin/logout", {}, {
                            headers: {
                                "X-API-TOKEN": token
                            }
                        });
                        if (response.status === 200) {
                            console.log("success");
                            const destroyTokenResponse = await axios.post("/token/destroy-token", {
                                token: token
                            });
                            console.log(destroyTokenResponse);
                            if (destroyTokenResponse.status === 200) {
                                console.log("Token destroyed");
                                window.location.replace("http://next-siakad-new.test:30/auth/login/admin");
                            }
                        }
                    } catch (error) {
                        console.error(error.response?.data.message || error.message);
                    }
                });
            }
        });
    </script> --}}
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
