<x-student-layout>
        <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-xl font-bold mb-4">Daftar Beasiswa yang Tersedia</h1>
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2 text-left">Nama Beasiswa</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Mulai</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Berakhir</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='border border-gray-300 px-4 py-2'>Beasiswa Unggulan</td>
                                <td class='border border-gray-300 px-4 py-2'>Program beasiswa nasional untuk mahasiswa berprestasi.</td>
                                <td class='border border-gray-300 px-4 py-2'>01-12-2024</td>
                                <td class='border border-gray-300 px-4 py-2'>31-12-2024</td>
                                <td class='border border-gray-300 px-4 py-2'>
                                    <a href='https://beasiswa-unggulan.com' class='bg-green-500 text-white py-1 px-3 rounded' target='_blank'>Daftar</a>
                                </td>
                            </tr>
                            <tr>
                                <td class='border border-gray-300 px-4 py-2'>Beasiswa Prestasi</td>
                                <td class='border border-gray-300 px-4 py-2'>Beasiswa untuk mahasiswa dengan prestasi luar biasa.</td>
                                <td class='border border-gray-300 px-4 py-2'>01-11-2024</td>
                                <td class='border border-gray-300 px-4 py-2'>30-11-2024</td>
                                <td class='border border-gray-300 px-4 py-2'>
                                    <a href='https://beasiswa-prestasi.com' class='bg-green-500 text-white py-1 px-3 rounded' target='_blank'>Daftar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>