<x-dosen-layout>
    <x-layout>
        <main class="mr-20 ml-20">
            <div class="container mx-auto p-6">
                <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Daftar Mahasiswa Bimbingan</h2>
                
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">NIM</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Nama</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Program Studi</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Semester</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3 text-sm border border-gray-300">123456</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">John Doe</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Teknik Informatika</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">4</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <button class="text-gray-600 hover:text-gray-900">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3 text-sm border border-gray-300">789012</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Jane Smith</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Teknik Informatika</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">6</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <button class="text-gray-600 hover:text-gray-900">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3 text-sm border border-gray-300">345678</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Alice Johnson</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Teknik Informatika</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">2</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <button class="text-gray-600 hover:text-gray-900">Detail</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-3 text-sm border border-gray-300">901234</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Bob Brown</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">Teknik Informatika</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">8</td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-3 text-sm border border-gray-300">
                                        <button class="text-gray-600 hover:text-gray-900">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>