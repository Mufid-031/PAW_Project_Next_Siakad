<x-admin-layout>
  <x-admin-sidebar>
    <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="py-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Nilai Mahasiswa</h1>
                    <div class="flex gap-4">
                        <select class="p-2 border rounded-lg">
                            <option>Pemrograman Web</option>
                            <option>Basis Data</option>
                            <option>Algoritma</option>
                        </select>
                    </div>
                </div>

                <!-- Grade Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-ultramarine-900 text-white">
                            <tr>
                                <th class="p-4">NIM</th>
                                <th class="p-4">Nama Mahasiswa</th>
                                <th class="p-4">Tugas</th>
                                <th class="p-4">UTS</th>
                                <th class="p-4">UAS</th>
                                <th class="p-4">Nilai Akhir</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">230411100198</td>
                                <td class="p-4">Imam Syafii</td>
                                <td class="p-4">85</td>
                                <td class="p-4">78</td>
                                <td class="p-4">88</td>
                                <td class="p-4">84</td>
                                <td class="p-4">
                                    <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                        <x-far-edit class="w-4 h-4" /> Ubah
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-4">230411100031</td>
                                <td class="p-4">Mufid Risqi</td>
                                <td class="p-4">90</td>
                                <td class="p-4">85</td>
                                <td class="p-4">92</td>
                                <td class="p-4">89</td>
                                <td class="p-4">
                                    <button class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                        <x-far-edit class="w-4 h-4" /> Ubah
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-4 flex justify-end">
                    <div class="flex gap-2">
                        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">Previous</button>
                        <button class="px-4 py-2 border rounded-lg bg-ultramarine-900 text-white">1</button>
                        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">2</button>
                        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">3</button>
                        <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">Next</button>
                    </div>
                </div> --}}
            </div>
        </div>
  </x-admin-sidebar>
</x-admin-layout>