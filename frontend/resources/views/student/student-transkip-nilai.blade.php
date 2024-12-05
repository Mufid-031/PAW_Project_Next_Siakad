<x-student-layout>
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            {{-- Transkip NIlai --}}
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Transkip Nilai
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah transkip nilai Anda.
                    </p>
                </div>
                <div class="overflow-x-auto mb-4">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">1</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">IF101</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">Algoritma dan Pemrograman</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">3</td>
                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">A</td>
                            </tr>

                            {{-- Melihat IPK --}}
                            <tr class="bg-gray-100">
                                <td colspan="4" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600 text-right">Nilai IPK:</td>
                                <td colspan="1" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600">3.45</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>

