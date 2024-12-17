<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Riwayat Absen Dosen</h1>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jam Masuk</th>
                        <th class="px-4 py-2 border">Jam Keluar</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">2023-10-01</td>
                        <td class="px-4 py-2 border">08:00</td>
                        <td class="px-4 py-2 border">16:00</td>
                        <td class="px-4 py-2 border">Hadir</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">2</td>
                        <td class="px-4 py-2 border">2023-10-02</td>
                        <td class="px-4 py-2 border">08:15</td>
                        <td class="px-4 py-2 border">16:15</td>
                        <td class="px-4 py-2 border">Hadir</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">3</td>
                        <td class="px-4 py-2 border">2023-10-03</td>
                        <td class="px-4 py-2 border">08:30</td>
                        <td class="px-4 py-2 border">16:30</td>
                        <td class="px-4 py-2 border">Terlambat</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </x-dosen-layout>
</x-layout>
