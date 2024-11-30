<div x-data="{ searchOpen: false }" class="w-full h-[60px] flex justify-between items-center px-2.5 py-0 relative">
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
                    <p class="text-sm text-gray-300">{{ $admin['data']['role'] }}</p>
                </div>
                <a href="#"
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
</div>

<script>
    const adminLogout = document.querySelector('#admin-logout');
    adminLogout.addEventListener('click', async () => {
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            const response = await axios.patch('http://localhost:3000/api/admin/logout',{}, {
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
