<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8" x-data="userManagement()">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="flex flex-col md:flex-row justify-between items-center p-4 border-b border-gray-200">
                        <h2 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Pengguna</h2>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div x-data="{ open: false }" class="relative ml-auto sm:ml-0">
                                <div @click="open = !open" class="relative overflow-hidden cursor-pointer">
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                        class="text-white bg-ultramarine-400 hover:bg-ultramarine-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                        type="button">Tambah
                                        User <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false" x-transition
                                    class="absolute right-0 mt-2 w-48 bg-ultramarine-400 rounded-md p-3 shadow-lg z-50">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="/admin/users/create/admin"
                                                class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Admin</a>
                                        </li>
                                        <li>
                                            <a href="/admin/users/create/teacher"
                                                class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Teacher</a>
                                        </li>
                                        <li>
                                            <a href="/admin/users/create/student"
                                                class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Student</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <select class="p-2 border rounded-lg" x-model="filterRole">
                                <option value="">-- Semua Role --</option>
                                <option value="STUDENT">Mahasiswa</option>
                                <option value="TEACHER">Dosen</option>
                            </select>

                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table id="usersTable" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="usersBody">
                                <template x-for="(user, index) in paginatedUsers" :key="user.id">
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4" x-text="index + 1 + (currentPage - 1) * rowsPerPage"></td>
                                        <td class="px-6 py-4" x-text="user.name"></td>
                                        <td class="px-6 py-4" x-text="user.email"></td>
                                        <td class="px-6 py-4" x-text="user.role"></td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <button @click="$dispatch('update-modal', { user: user })"
                                                    class="font-medium flex items-center gap-1">
                                                    <x-far-edit class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Ubah</span>
                                                </button>
                                                <button @click="deleteUser(user.id)"
                                                    class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                    <x-ionicon-trash-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="px-6 py-4">
                        <div id="paginationControls" class="flex justify-center space-x-2">
                            <template x-for="page in totalPages" :key="page">
                                <button @click="currentPage = page" :class="{ 'bg-blue-700': currentPage === page }"
                                    class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700"
                                    x-text="page"></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function userManagement() {
                    return {
                        users: @json($users['data']),
                        currentPage: 1,
                        rowsPerPage: 10,
                        filterRole: '', // Untuk menyimpan nilai filter
                        get filteredUsers() {
                            if (this.filterRole) {
                                return this.users.filter(user => user.role === this.filterRole);
                            }
                            return this.users;
                        },
                        get paginatedUsers() {
                            const start = (this.currentPage - 1) * this.rowsPerPage;
                            const end = start + this.rowsPerPage;
                            return this.filteredUsers.slice(start, end);
                        },
                        get totalPages() {
                            return Math.ceil(this.filteredUsers.length / this.rowsPerPage);
                        },
                        async deleteUser(id) {
                            const confirmDelete = await Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!'
                            });

                            if (confirmDelete.isConfirmed) {
                                try {
                                    const token = await axios.post('/token/get-token').then(res => res.data);
                                    const response = await axios.delete(`http://localhost:3000/api/teacher/${id}`, {
                                        headers: {
                                            'X-API-TOKEN': `${token}`
                                        }
                                    }).then(res => res.data);
                                    if (response.status === 201) {
                                        Swal.fire(
                                            'Dihapus!',
                                            'Pengguna telah dihapus.',
                                            'success'
                                        );
                                        this.users = this.users.filter(user => user.id !== id);
                                        if (this.paginatedUsers.length === 0 && this.currentPage > 1) {
                                            this.currentPage--;
                                        }
                                    }
                                } catch (error) {
                                    Swal.fire(
                                        'Gagal!',
                                        'Pengguna gagal dihapus.',
                                        'error'
                                    );
                                }
                            }
                        }
                    }
                }
            </script>
            <x-users-update :admin="$admin" />
        </div>
    </x-admin-sidebar>
</x-admin-layout>
