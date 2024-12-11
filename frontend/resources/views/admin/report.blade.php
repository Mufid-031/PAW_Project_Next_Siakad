<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <!-- Page Title -->
            <h1 class="text-2xl font-bold mb-6">Laporan Akademik</h1>
            <!-- Recent Grades Table -->
            <div class="bg-white rounded-lg shadow mb-8">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Nilai Terkini</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mahasiswa
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mata
                                        Kuliah</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">Imam Syafii</td>
                                    <td class="px-6 py-4">Pemrograman Web</td>
                                    <td class="px-6 py-4">A</td>
                                    <td class="px-6 py-4"><span
                                            class="px-2 py-1 bg-green-100 text-green-800 rounded-full">Lulus</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">Mufid</td>
                                    <td class="px-6 py-4">Basis Data</td>
                                    <td class="px-6 py-4">B+</td>
                                    <td class="px-6 py-4"><span
                                            class="px-2 py-1 bg-green-100 text-green-800 rounded-full">Lulus</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Grafik Performa Akademik</h2>
                    <div class="h-64 bg-gray-50 rounded flex items-center justify-center">
                        <p class="text-gray-500">Grafik akan ditampilkan di sini</p>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
