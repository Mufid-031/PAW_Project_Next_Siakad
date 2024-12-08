<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold text-center mb-5">Histori Pembayaran UKT</h1>
                    <div class="container mx-auto">
                        <table class="table-auto w-full bg-white shadow-md rounded border border-gray-200">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Jumlah Dibayar</th>
                                    <th class="px-4 py-2">Metode Pembayaran</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh Data -->
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">Semester 1 </td>
                                    <td class="px-4 py-2">Rp 2.000.000</td>
                                    <td class="px-4 py-2">Bank Transfer</td>
                                    <td class="px-4 py-2 text-green-600 font-bold">SUCCESS</td>
                                </tr>
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">Semester 2 </td>
                                    <td class="px-4 py-2">Rp 2.000.000</td>
                                    <td class="px-4 py-2">E-Wallet</td>
                                    <td class="px-4 py-2 text-yellow-600 font-bold">PENDING</td>
                                </tr>
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">Semester 3 </td>
                                    <td class="px-4 py-2">Rp 2.000.000</td>
                                    <td class="px-4 py-2">Bank Transfer</td>
                                    <td class="px-4 py-2 text-red-600 font-bold">FAILED</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>