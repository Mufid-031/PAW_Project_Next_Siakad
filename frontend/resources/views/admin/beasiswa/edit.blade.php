<x-layout>
    <x-admin-layout>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <h1 class="text-xl font-bold mb-4">Edit Beasiswa</h1>
            <form action="" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Beasiswa</label>
                    <input type="text" name="nama" value="Beasiswa Unggulan" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border border-gray-300 rounded p-2" rows="4">Program beasiswa nasional untuk mahasiswa berprestasi.</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Mulai</label>
                    <input type="datetime-local" name="mulai" value="2024-12-01T00:00" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Berakhir</label>
                    <input type="datetime-local" name="akhir" value="2024-12-31T23:59" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Link Beasiswa</label>
                    <input type="url" name="link" value="https://beasiswa-unggulan.com" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <button type="submit" name="update" class="bg-yellow-500 text-white py-2 px-4 rounded">Perbarui Beasiswa</button>
            </form>
        </main>
    </x-admin-layout>
</x-layout>