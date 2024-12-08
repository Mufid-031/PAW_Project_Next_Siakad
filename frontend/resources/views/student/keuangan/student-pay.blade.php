<x-layout>
    <x-student-layout :student="$student">
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold mb-5">Form Pembayaran</h1>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium">Nama</label>
                            <input type="text" value="John Doe" readonly class="w-full border px-3 py-2 rounded bg-gray-100">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium">Golongan</label>
                            <input type="text" value="III" readonly class="w-full border px-3 py-2 rounded bg-gray-100">
                            <p class="text-sm text-gray-500 mt-1">Anda termasuk golongan III</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium">Jumlah UKT</label>
                            <input type="text" value="5000000" readonly class="w-full border px-3 py-2 rounded bg-gray-100">
                        </div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Bayar</button>
                    </form>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>