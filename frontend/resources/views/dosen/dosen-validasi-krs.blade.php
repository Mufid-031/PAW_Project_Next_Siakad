<x-dosen-layout>
    <x-layout>
            <main class="mr-20 ml-20">
                <div class="container mx-auto p-6">
                    <h2 class="text-2xl font-bold text-center mb-6 text-black">Validasi Kartu Rencana Studi (KRS)</h2>
                    
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">NIM</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Nama</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Program Studi</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Semester</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Status KRS</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Mahasiswa 1 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">12345678</td>
                                        <td class="px-4 py-2 border-b">John Doe</td>
                                        <td class="px-4 py-2 border-b">Teknik Informatika</td>
                                        <td class="px-4 py-2 border-b">6</td>
                                        <td class="px-4 py-2 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                            <button class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Validasi</button>
                                            <a href="{{ route('dosen.detail.krs') }}" class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Detail</a>
                                        </td>
                                    </tr>
                                    <!-- Mahasiswa 2 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">87654321</td>
                                        <td class="px-4 py-2 border-b">Jane Smith</td>
                                        <td class="px-4 py-2 border-b">Sistem Informasi</td>
                                        <td class="px-4 py-2 border-b">4</td>
                                        <td class="px-4 py-2 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                            <button class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Validasi</button>
                                            <a href="{{ route('dosen.detail.krs') }}" class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Detail</a>
                                        </td>
                                    </tr>
                                    <!-- Mahasiswa 3 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">13579246</td>
                                        <td class="px-4 py-2 border-b">Michael Brown</td>
                                        <td class="px-4 py-2 border-b">Manajemen Informatika</td>
                                        <td class="px-4 py-2 border-b">8</td>
                                        <td class="px-4 py-2 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tervalidasi</span>
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                            <button class="px-4 py-2 rounded-md bg-gray-500 text-white text-sm font-semibold cursor-not-allowed">Sudah Validasi</button>
                                            <a href="{{ route('dosen.detail.krs') }}" class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Detail</a>
                                        </td>
                                    </tr>
                                    <!-- Mahasiswa 4 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">24681357</td>
                                        <td class="px-4 py-2 border-b">Emily Davis</td>
                                        <td class="px-4 py-2 border-b">Teknik Komputer</td>
                                        <td class="px-4 py-2 border-b">2</td>
                                        <td class="px-4 py-2 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                            <button class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Validasi</button>
                                            <a href="{{ route('dosen.detail.krs') }}" class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Detail</a>
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