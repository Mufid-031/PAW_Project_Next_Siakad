<x-dosen-layout>
    <x-layout>
            <main class="mr-20 ml-20">
                <div class="container mx-auto p-6">
                    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Daftar Mahasiswa Bimbingan</h2>
                    
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">NIM</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Nama</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Program Studi</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Semester</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Status</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm border-b">123456</td>
                                        <td class="px-6 py-4 text-sm border-b">John Doe</td>
                                        <td class="px-6 py-4 text-sm border-b">Teknik Informatika</td>
                                        <td class="px-6 py-4 text-sm border-b">4</td>
                                        <td class="px-6 py-4 text-sm border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm border-b">
                                            <button class="text-gray-600 hover:text-gray-900">Detail</button>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm border-b">789012</td>
                                        <td class="px-6 py-4 text-sm border-b">Jane Smith</td>
                                        <td class="px-6 py-4 text-sm border-b">Teknik Informatika</td>
                                        <td class="px-6 py-4 text-sm border-b">6</td>
                                        <td class="px-6 py-4 text-sm border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">Aktif</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm border-b">
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