<x-layout>
    <x-admin-layout>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Data Beasiswa</h1>
                <a href="{{ url('/beasiswa-tambah') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah Beasiswa</a>
            </div>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Beasiswa</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Mulai</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Berakhir</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Link</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='border border-gray-300 px-4 py-2'>Beasiswa Unggulan</td>
                        <td class='border border-gray-300 px-4 py-2'>Program beasiswa nasional untuk mahasiswa berprestasi.</td>
                        <td class='border border-gray-300 px-4 py-2'>01-12-2024</td>
                        <td class='border border-gray-300 px-4 py-2'>31-12-2024</td>
                        <td class='border border-gray-300 px-4 py-2'><a href='https://beasiswa-unggulan.com' class='text-blue-500 underline' target='_blank'>Lihat</a></td>
                        <td class='border border-gray-300 px-4 py-2 text-center'>
                            <div class='flex justify-center'>
                                <a href="{{ url('/beasiswa-edit') }}" class='bg-yellow-500 text-white py-1 px-3 rounded mr-2'>Edit</a>
                                <a href='delete.php' class='bg-red-500 text-white py-1 px-3 rounded' onclick='return confirm("Yakin ingin menghapus?")'>Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class='border border-gray-300 px-4 py-2'>Beasiswa Prestasi</td>
                        <td class='border border-gray-300 px-4 py-2'>Beasiswa untuk mahasiswa dengan prestasi luar biasa.</td>
                        <td class='border border-gray-300 px-4 py-2'>01-11-2024</td>
                        <td class='border border-gray-300 px-4 py-2'>30-11-2024</td>
                        <td class='border border-gray-300 px-4 py-2'><a href='https://beasiswa-prestasi.com' class='text-blue-500 underline' target='_blank'>Lihat</a></td>
                        <td class='border border-gray-300 px-4 py-2 text-center'>
                            <div class='flex justify-center'>
                                <a href="{{ url('/beasiswa-edit') }}" class='bg-yellow-500 text-white py-1 px-3 rounded mr-2'>Edit</a>
                                <a href='delete.php' class='bg-red-500 text-white py-1 px-3 rounded' onclick='return confirm("Yakin ingin menghapus?")'>Hapus</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </x-admin-layout>
</x-layout>