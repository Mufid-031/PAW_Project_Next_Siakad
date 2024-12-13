{{-- {{ dd($scholarships) }} --}}

<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <main class="container mx-auto px-6 py-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Data Beasiswa</h1>
                <a href="/admin/service/beasiswa/create"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah Beasiswa</a>
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
                    @foreach ($scholarships['data'] as $scholarship)
                        <tr></tr>
                            <td class='border border-gray-300 px-4 py-2'>{{ $scholarship['nama'] }}</td>
                            <td class='border border-gray-300 px-4 py-2'>{{ $scholarship['deskripsi'] }}</td>
                            <td class='border border-gray-300 px-4 py-2'>{{ \Carbon\Carbon::parse($scholarship['mulai'])->setTimezone('Asia/Jakarta')->format('d-m-Y') }}</td>
                            <td class='border border-gray-300 px-4 py-2'>{{ \Carbon\Carbon::parse($scholarship['akhir'])->setTimezone('Asia/Jakarta')->format('d-m-Y') }}</td>
                            <td class='border border-gray-300 px-4 py-2'>
                                <a class='text-blue-500 underline' target='_blank' href="{{ $scholarship['link'] }}">
                                    Link
                                </a>
                            </td>
                            <td class='border border-gray-300 px-4 py-2 text-center'>
                                <div class='flex justify-center'>
                                    <a href="{{ url('/beasiswa-edit') }}"
                                        class='bg-yellow-500 text-white py-1 px-3 rounded mr-2'>Edit</a>
                                    <a href='delete.php' class='bg-red-500 text-white py-1 px-3 rounded'
                                        onclick='return confirm("Yakin ingin menghapus?")'>Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </x-admin-sidebar>
</x-admin-layout>
