<x-student-layout>
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg">
                <!-- Header Section -->
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Kartu Rencana Studi (KRS)
                    </h1>
                    
                    <p class="text-gray-600 mb-4 text-center">
                        KRS adalah dokumen yang berisi daftar mata kuliah yang akan diambil oleh mahasiswa dalam satu semester. 
                        Pastikan untuk memperhatikan prasyarat dan jumlah SKS maksimal yang diperbolehkan.
                    </p>
                    
                    <div class="flex justify-between items-center text-sm font-medium text-gray-600">
                        <span>Tahun Ajaran: 2024/2025</span>
                    </div>
                </div>
        
                <!-- Main Content -->
                <div class="p-6">
                    <!-- Add Button -->
                    <button onclick="location.href='../student/tambah-krs'" class="mb-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Mata Kuliah
                    </button>
        
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                    <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                    <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">1</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF101</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Algoritma dan Pemrograman</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">1</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">3</td>
                                    <td class="border border-gray-200 px-4 py-3 text-center">
                                        <button class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="bg-gray-50">
                                    <td colspan="4" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600 text-right">
                                        Total SKS:
                                    </td>
                                    <td colspan="2" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600">
                                        10
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>
