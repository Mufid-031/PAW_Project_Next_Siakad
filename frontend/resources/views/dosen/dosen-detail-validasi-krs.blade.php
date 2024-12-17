<x-dosen-layout :teacher="$teacher">
    <x-layout>
            <main class="mr-20 ml-20 mt-5">
                <div class="container mx-auto p-6">
                    <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">Validasi Kartu Rencana Studi (KRS)</h2>
                    
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <form>
                            <!-- Informasi Mahasiswa -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Mahasiswa</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">NIM</label>
                                        <input type="text" value="12345678" disabled 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" value="John Doe" disabled 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Program Studi</label>
                                        <input type="text" value="Teknik Informatika" disabled 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Semester</label>
                                        <input type="text" value="6" disabled 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                
                            <!-- Daftar Mata Kuliah -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Mata Kuliah</h3>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full border-collapse border border-gray-200">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Kode MK</th>
                                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Nama Mata Kuliah</th>
                                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">SKS</th>
                                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border-b">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 border-b">IF123</td>
                                                <td class="px-6 py-4 border-b">Algoritma dan Struktur Data</td>
                                                <td class="px-6 py-4 border-b">3</td>
                                                <td class="px-6 py-4 border-b">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                                </td>
                                            </tr>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 border-b">IF234</td>
                                                <td class="px-6 py-4 border-b">Pemrograman Web</td>
                                                <td class="px-6 py-4 border-b">3</td>
                                                <td class="px-6 py-4 border-b">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                
                            <!-- Tombol Validasi -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700">
                                    Validasi KRS
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </main>
        </x-layout>
    </x-dosen-layout>