<x-dosen-layout>
    <x-layout>
        <main class="ml-20 mr-20">
            <div class="bg-white rounded-lg shadow-lg p-6">
<form action="" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" required>
    </div>
    <div class="mb-4">
        <label for="nip" class="block text-gray-700 text-sm font-bold mb-2">NIP:</label>
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nip" name="nip" required>
    </div>
    <div class="mb-4">
        <label for="tanggal_mulai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai:</label>
        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tanggal_mulai" name="tanggal_mulai" required>
    </div>
    <div class="mb-4">
        <label for="tanggal_selesai" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Selesai:</label>
        <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tanggal_selesai" name="tanggal_selesai" required>
    </div>
    <div class="mb-4">
        <label for="alasan" class="block text-gray-700 text-sm font-bold mb-2">Alasan Cuti:</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alasan" name="alasan" rows="3" required></textarea>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajukan Cuti</button>
</form>
            </div>
</main>
    </x-layout>
</x-dosen-layout>