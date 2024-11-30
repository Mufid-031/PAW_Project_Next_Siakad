<x-layout>
    <x-admin-layout>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <h1 class="text-2xl font-bold text-center mb-5">Kelola golongan UKT</h1>
            <div class="container mx-auto">
                <table class="table-auto w-full bg-white shadow-md rounded border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="px-4 py-2">Golongan</th>
                            <th class="px-4 py-2">Jumlah UKT</th>
                            <th class="px-4 py-2">Tenggat Waktu</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">I</td>
                            <td class="px-4 py-2">-</td>
                            <td class="px-4 py-2">-</td>
                            <td class="px-4 py-2">
                                <a href="{{ url('/UKT-edit') }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">II</td>
                            <td class="px-4 py-2">1000000</td>
                            <td class="px-4 py-2">15-05-2025</td>
                            <td class="px-4 py-2">
                                <a href="{{ url('/UKT-edit') }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">III</td>
                            <td class="px-4 py-2">1500000</td>
                            <td class="px-4 py-2">15-05-2025</td>
                            <td class="px-4 py-2">
                                <a href="{{ url('/UKT-edit') }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">IV</td>
                            <td class="px-4 py-2">2000000</td>
                            <td class="px-4 py-2">15-05-2025</td>
                            <td class="px-4 py-2">
                                <a href="{{ url('/UKT-edit') }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">V</td>
                            <td class="px-4 py-2">2500000</td>
                            <td class="px-4 py-2">15-05-2025</td>
                            <td class="px-4 py-2">
                                <a href="{{ url('/UKT-edit') }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </x-admin-layout>
</x-layout>