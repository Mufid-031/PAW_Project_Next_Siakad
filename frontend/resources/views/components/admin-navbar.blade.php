{{-- {{ dd($admin) }} --}}

@props(['admin' => $admin])
<div x-data="{ searchOpen: false, profileModal: false }" class="w-full h-[60px] flex justify-between items-center px-2.5 py-0 relative">
    <!-- Toggle menu Button -->
    <button @click="sidebarOpen = !sidebarOpen"
        class="relative w-[60px] h-[60px] flex justify-center items-center text-[2.5rem] cursor-pointer z-50">
        <x-zondicon-menu x-show="!sidebarOpen"
            class="w-[1.75rem] transition-transform duration-300 transform hover:scale-110" />
        <x-zondicon-close x-show="sidebarOpen"
            class="w-[1.75rem] transition-transform duration-300 transform hover:scale-110" />
    </button>

    <!-- Search for desktop -->
    <div class="relative w-full max-w-[400px] mx-2.5 my-0 hidden sm:block">
        <label class="relative w-full">
            <input type="text" placeholder="Search here"
                class="w-full h-10 text-lg border border-slate-600 pl-[35px] px-5 py-[5px] rounded-[40px] border-solid">
            <x-zondicon-search
                class="absolute w-[1.2rem] left-2.5 top-1/2 -translate-y-1/2 transition-transform duration-300 transform group-hover:scale-110" />
        </label>
    </div>

    <!-- Search toggle for mobile -->
    <button @click="searchOpen = !searchOpen" class="sm:hidden">
        <x-zondicon-search class="w-[1.4rem] mx-2" />
    </button>

    <!-- Mobile Search Bar -->
    <div x-show="searchOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="absolute left-0 right-0 top-[60px] p-4 sm:hidden z-50">
        <label class="relative w-full block">
            <input type="text" placeholder="Search here"
                class="w-full h-10 text-lg border border-slate-600 pl-[35px] px-5 py-[5px] rounded-[40px] border-solid">
            <x-zondicon-search
                class="absolute w-[1.2rem] left-2.5 top-1/2 -translate-y-1/2 transition-transform duration-300 transform group-hover:scale-110" />
        </label>
    </div>

    <!-- Profile Image with Dropdown -->
    <div x-data="{ open: false }" class="relative ml-auto sm:ml-0">
        <div @click="open = !open" class="relative w-10 h-10 overflow-hidden cursor-pointer rounded-[50%] group">
            <img src="/image/1037.png" alt="Profile Image"
                class="absolute w-full h-full object-cover left-0 top-0 transition-transform duration-300 transform group-hover:scale-110">
        </div>

        <!-- Dropdown Menu -->
        <div x-show="open" @click.away="open = false" x-transition
            class="absolute right-0 mt-2 w-48 bg-ultramarine-900 rounded-md p-3 shadow-lg z-50">
            <div>
                <div class="text-white border-b border-slate-900 pb-3 mb-3">
                    <p class="font-semibold text-lg">{{ $admin['data']['name'] }}</p>
                </div>
                <a href="#" @click.prevent="profileModal = true; open = false"
                    class="p-2 text-sm gap-2 items-center flex text-white hover:bg-ultramarine-300 hover:text-black rounded-lg transition duration-150">
                    <x-carbon-user-profile class="w-5" /> Profile
                </a>
                <button id="admin-logout"
                    class="w-full text-left p-2 text-sm gap-2 items-center flex text-white hover:bg-ultramarine-300 hover:text-black rounded-lg transition duration-150">
                    <x-ionicon-log-out-outline class="w-5" /> Logout
                </button>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div x-show="profileModal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <div x-show="profileModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95" @click.away="profileModal = false"
                class="bg-white rounded-lg shadow-xl max-w-md w-full relative">

                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Profile Details</h3>
                    <button @click="profileModal = false" class="text-gray-400 hover:text-gray-500">
                        <x-zondicon-close class="w-6 h-6" />
                    </button>
                </div>

                <div class="p-6">
                    <div class="flex items-center space-x-4 mb-6">
                        <x-ionicon-person-circle-outline class="w-16 h-16" />
                        <div>
                            <h4 class="text-lg font-semibold">{{ $admin['data']['name'] }}</h4>
                            <p class="text-gray-600">{{ $admin['data']['role'] }}</p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Email:</label>
                            <p class="mt-1 text-gray-900">{{ $admin['data']['email'] }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Dibuat pada:</label>
                            <p class="mt-1 text-gray-900">
                                {{ \Carbon\Carbon::parse($admin['data']['createdAt'])->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-lg">
                    <button @click="profileModal = false"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-ultramarine-600 text-base font-medium text-white hover:bg-ultramarine-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ultramarine-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const adminLogout = document.querySelector('#admin-logout');
    adminLogout.addEventListener('click', async () => {
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            const response = await axios.patch('http://localhost:3000/api/admin/logout', {}, {
                headers: {
                    'X-API-TOKEN': token
                }
            }).then(data => data.data);
            if (response.status === 200) {
                await axios.post('/token/destroy-token');
                window.location.replace('http://127.0.0.1:8000/auth/login/admin');
            }
        } catch (error) {
            console.log(error)
        }
    });
</script>
