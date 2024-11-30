<x-admin-layout>
    <x-admin-sidebar>
        <div x-data="{ isUpdateModalOpen: false }" class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Pengguna</h2>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div x-data="{ open: false }" class="relative ml-auto sm:ml-0">
                            <div @click="open = !open" class="relative overflow-hidden cursor-pointer">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                    class="text-white bg-ultramarine-400 hover:bg-ultramarine-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center
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
                                        <a href="/users/create/admin"
                                            class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Admin</a>
                                    </li>
                                    <li>
                                        <a href="/users/create/teacher"
                                            class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Teacher</a>
                                    </li>
                                    <li>
                                        <a href="/users/create/student"
                                            class="block px-4 py-2 text-white hover:bg-slate-200 hover:text-black rounded-lg">Student</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <select class="p-2 border rounded-lg">
                            <option value="">-- Filter --</option>
                            <option value="student">Mahasiswa</option>
                            <option value="teacher">Dosen</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-ultramarine-900 text-white">
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            No</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Nama</th>
                                        <th scope="col"
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Email</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Peran</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            1</td>
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            Imam Syafii</td>
                                        <td
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            404imam@gmail.com</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                Admin
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                            <div
                                                class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                <button @click="$dispatch('update-modal')"
                                                    class="font-medium flex items-center gap-1">
                                                    <x-far-edit class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Ubah</span>
                                                </button>
                                                <button
                                                    class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                    <x-ionicon-trash-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            2</td>
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            Mufid</td>
                                        <td
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            mufid@gmail.com</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                Mahasiswa
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                            <div
                                                class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                <button @click="$dispatch('update-modal')"
                                                    class="font-medium flex items-center gap-1">
                                                    <x-far-edit class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Ubah</span>
                                                </button>
                                                <button
                                                    class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                    <x-ionicon-trash-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
    <x-users-update />
</x-admin-layout>
