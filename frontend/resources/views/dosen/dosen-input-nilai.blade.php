{{-- {{ dd($absences) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20" x-data>
            <div class="max-w-6xl mx-auto p-6">
                <a href="/dosen/sivitas" class="flex items-center text-gray-400 hover:text-gray-300 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">Nama Mata Kuliah</h1>
                        <p class="text-gray-600">Kode Mata Kuliah (IF2333)</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">Nama Dosen</p>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Input Nilai Mahasiswa
                    </h1>
                </div>

                <div class="overflow-x-auto mb-4">
                    <form>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nama Mahasiswa</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ini (NIM Mahasiswa)</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                        <select name="nilai" class="w-20 border border-gray-300 rounded-md p-1">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                        <button type="button"
                                                class="ml-2 px-2 py-1 flex text-xs font-semibold text-white bg-blue-500 rounded update-status">
                                                <x-fas-edit class="w-4 h-4" /> Update
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </main>
    </x-dosen-layout>
    <x-dosen-absen-modal />
</x-layout>
