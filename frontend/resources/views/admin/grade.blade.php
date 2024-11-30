<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="p-6">
                <div class="mb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <h1 class="text-2xl font-bold text-gray-800">Manajemen Nilai Mahasiswa</h1>
                        <div class="mt-4 md:mt-0">
                            <div class="flex gap-4 items-center">
                                <select
                                    class="p-2 border rounded-lg focus:ring-2 focus:ring-ultramarine-500 focus:border-ultramarine-500">
                                    <option value="">Pilih Mata Kuliah</option>
                                    <option>Pemrograman Web</option>
                                    <option>Basis Data</option>
                                    <option>Algoritma</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grade Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-ultramarine-900 text-white">
                                    <th class="p-4 font-semibold">NIM</th>
                                    <th class="p-4 font-semibold">Nama Mahasiswa</th>
                                    <th class="p-4 font-semibold">Nilai Akhir</th>
                                    <th class="p-4 font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50 transition duration-150">
                                    <td class="p-4">230411100198</td>
                                    <td class="p-4 font-medium">Imam Syafii</td>
                                    <td class="p-4">
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                            84
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <button
                                            class="flex items-center gap-1 text-ultramarine-600 hover:text-ultramarine-800">
                                            <x-far-edit class="w-4 h-4" />
                                            <span class="text-sm font-medium">Ubah</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50 transition duration-150">
                                    <td class="p-4">230411100031</td>
                                    <td class="p-4 font-medium">Mufid Risqi</td>
                                    <td class="p-4">
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                            89
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <button
                                            class="flex items-center gap-1 text-ultramarine-600 hover:text-ultramarine-800">
                                            <x-far-edit class="w-4 h-4" />
                                            <span class="text-sm font-medium">Ubah</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <div class="hidden sm:block">
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of
                                <span class="font-medium">20</span> results
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <button
                                class="px-4 py-2 border rounded-lg text-sm font-medium hover:bg-gray-50 disabled:opacity-50">Previous</button>
                            <button
                                class="px-4 py-2 border rounded-lg text-sm font-medium bg-ultramarine-900 text-white">1</button>
                            <button class="px-4 py-2 border rounded-lg text-sm font-medium hover:bg-gray-50">2</button>
                            <button class="px-4 py-2 border rounded-lg text-sm font-medium hover:bg-gray-50">3</button>
                            <button
                                class="px-4 py-2 border rounded-lg text-sm font-medium hover:bg-gray-50">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
