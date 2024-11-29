<x-student-layout>
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Jadwal Mata Kuliah
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah jadwal mata kuliah yang telah Anda pilih.
                    </p>
                </div>

                <!-- Schedule Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Dosen</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">1</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF101</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Algoritma dan Pemrograman</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Dr. John Doe</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Senin, 08:00 - 10:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 101</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>
