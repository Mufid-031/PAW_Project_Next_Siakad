
<x-dosen-layout>
    <x-layout>
        <main class="ml-20 mr-20">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Jadwal Mengajar
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah jadwal mata kuliah.
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
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">1</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF101</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Algoritma dan Pemrograman</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Senin, 08:00 - 10:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 101</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">2</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF102</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Struktur Data</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Selasa, 10:00 - 12:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 102</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">3</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF103</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Basis Data</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Rabu, 13:00 - 15:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 103</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">4</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF104</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Jaringan Komputer</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Kamis, 08:00 - 10:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 104</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">5</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF105</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Pemrograman Web</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Jumat, 10:00 - 12:00</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Ruang 105</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
