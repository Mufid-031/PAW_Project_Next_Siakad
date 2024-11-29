<x-student-layout>
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Bagian Header -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800">
                        Pengajuan Cuti Diri dari Universitas
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Silakan isi formulir berikut untuk mengajukan Cuti dari universitas.
                    </p>
                </div>

                <!-- Form Pengunduran Diri -->
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" id="nim" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="date_start" class="block text-sm font-medium text-gray-700">Tanggal Mulai Cuti</label>
                        <input type="date" name="date_start" id="date_start" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="date_end" class="block text-sm font-medium text-gray-700">Tanggal Selesai Cuti</label>
                        <input type="date" name="date_end" id="date_end" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="reason" class="block text-sm font-medium text-gray-700">Alasan Cuti</label>
                        <textarea name="reason" id="reason" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg">
                            Ajukan Cuti
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </x-layout>
</x-student-layout>