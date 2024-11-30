<x-layout>
    <x-admin-layout>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <h1 class="text-2xl font-bold mb-5">Edit Data Golongan</h1>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Nama Golongan</label>
                    <input type="text" value="I" readonly class="w-full border px-3 py-2 rounded bg-gray-100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Jumlah UKT</label>
                    <input type="number" name="jumlah_ukt" placeholder="Masukkan jumlah UKT" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Tenggat Waktu</label>
                    <input type="date" name="tenggat_waktu" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                    <a href="{{ url('/UKT') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
                </div>
            </form>
        </main>
    </x-admin-layout>
</x-layout>