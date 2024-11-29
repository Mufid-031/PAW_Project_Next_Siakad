<x-layout>
    <x-student-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-6xl mx-auto p-6">
                <a href="../student/sivitas" class="flex items-center text-gray-600 hover:text-gray-900 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">Matkul 1</h1>
                        <p class="text-gray-600">Kelas A</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">Imam Fahrur Rozi, ST., MT.</p>
                        </div>
                        {{-- <div>
                            <h3 class="text-sm font-medium text-gray-500">Semester</h3>
                            <p class="text-gray-800">Gasal 2024/2025</p>
                        </div> --}}
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-800">Riwayat Kehadiran</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pertemuan
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Materi
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        1
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        18 Agustus 2024
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        Materi
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            hadir
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>