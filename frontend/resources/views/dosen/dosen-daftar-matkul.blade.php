<x-dosen-layout>
    <x-layout>
        <main class="ml-20 mr-20">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-xl text-center font-bold mb-4">Mata Kuliah Asuh</h1>
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No.</th>
                            <th class="border border-gray-300 px-4 py-2">Kode MK</th>
                            <th class="border border-gray-300 px-4 py-2">Nama MK</th>
                            <th class="border border-gray-300 px-4 py-2">Kelas</th>
                            <th class="border border-gray-300 px-4 py-2">Cetak Nilai</th>
                            <th class="border border-gray-300 px-4 py-2">Evaluasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.input-nilai') }}" class="bg-yellow-500 text-white px-4 py-2 rounded inline-block">
                                    010700
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">SISTEM OPERASI</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">IFB2X</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.cetak-nilai') }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">
                                    Cetak
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="bg-green-500 text-white px-4 py-2 rounded">
                                    Evaluasi
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">2</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.input-nilai') }}" class="bg-yellow-500 text-white px-4 py-2 rounded inline-block">
                                    110200
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">ANALISIS DESAIN ORIENTASI OBJEK</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">IFB3C</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.cetak-nilai', ['kode_mk' => '110200']) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">
                                    Cetak
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="bg-green-500 text-white px-4 py-2 rounded">
                                    Evaluasi
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">3</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.input-nilai', ['kode_mk' => '120300']) }}" class="bg-yellow-500 text-white px-4 py-2 rounded inline-block">
                                    120300
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">TEKNOLOGI MULTIMEDIA</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">TIB2A</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('dosen.cetak-nilai', ['kode_mk' => '120300']) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">
                                    Cetak
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="bg-green-500 text-white px-4 py-2 rounded">
                                    Evaluasi
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
