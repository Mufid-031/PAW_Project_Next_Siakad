<x-admin-layout>
  <x-admin-sidebar>
    <div class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Mata Kuliah</h2>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#"
                            class="bg-ultramarine-400 hover:bg-ultramarine-900 text-white px-4 py-2 rounded-md transition duration-300 text-center">
                            Tambah Mata Kuliah
                        </a>
                        <select class="p-2 border rounded-lg">
                            <option>-- Filter --</option>
                            <option>Pemrograman Web</option>
                            <option>Basis Data</option>
                            <option>Algoritma</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-ultramarine-50">
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
                                            No</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
                                            Nama Mata Kuliah</th>
                                        <th scope="col"
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
                                            Kode</th>
                                        <th scope="col"
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
                                            Program Studi</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
                                            Pengajar</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold text-ultramarine-900">
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
                                            Basis Data</td>
                                        <td
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            E2398</td>
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            Teknik Informatika</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                Andharini Dwi Cahyani
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                            <div
                                                class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                <a href="#" class="font-medium flex items-center gap-1">
                                                    <x-far-edit class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Ubah</span>
                                                </a>
                                                <button
                                                    class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                    <x-ionicon-trash-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                                <button
                                                    class="text-ultramarine-500 hover:text-ultramarine-500 font-medium flex items-center gap-1">
                                                    <x-ionicon-document-text-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Detail</span>
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
                                            Dasar Pemrograman Web</td>
                                        <td
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            E3932</td>
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            Teknik Informatika</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                Noor Ifada
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                            <div
                                                class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                <a href="#" class="font-medium flex items-center gap-1">
                                                    <x-far-edit class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Ubah</span>
                                                </a>
                                                <button
                                                    class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                    <x-ionicon-trash-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Hapus</span>
                                                </button>
                                                <button
                                                    class="text-ultramarine-500 hover:text-ultramarine-500 font-medium flex items-center gap-1">
                                                    <x-ionicon-document-text-outline class="w-4 h-4" />
                                                    <span class="hidden sm:inline">Detail</span>
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
</x-admin-layout>