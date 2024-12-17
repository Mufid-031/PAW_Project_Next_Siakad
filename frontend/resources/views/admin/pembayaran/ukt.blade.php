
<x-layout>
    <x-admin-layout :admin="$admin">
        <main class="ml-20 mr-20" x-data>
            <div class="max-w-6xl mx-auto p-6">
                <a href="/admin/service" class="flex items-center text-gray-400 hover:text-gray-300 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">Data Pembayaran</h1>
                        <p class="text-gray-600">Uang Kuliah Tahunan</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <select name="semester" id="semester" class="w-1/2">
                            <option value="semester_1">Semester 1</option>
                            <option value="semester_2">Semester 2</option>
                        </select>
                        <div class="text-right">
                            <button @click="$dispatch('create-pembayaran-modal')"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                                Tambah Pembayaran
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b grid grid-cols-2">
                        <h2 class="text-lg font-semibold text-gray-800">Riwayat Pembayaran</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Semester</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if (!empty($absences['data']))
                                    @foreach ($absences['data'] as $absence)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $absence['pertemuan'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($absence['statusCounts'][0]['createAt'])->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $absence['statusCounts'][0]['materi'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @php
                                                    $statuses = collect($absence['statusCounts'])->keyBy(
                                                        'statusKehadiran',
                                                    );
                                                @endphp
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    HADIR
                                                    {{ $statuses['HADIR']['count'] ?? '0' }}
                                                </span>
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    ALPHA
                                                    {{ $statuses['ALPA']['count'] ?? '0' }}
                                                </span>
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    SAKIT
                                                    {{ $statuses['SAKIT']['count'] ?? '0' }}
                                                </span>
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    IZIN
                                                    {{ $statuses['IZIN']['count'] ?? '0' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            Tidak ada data absensi.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-admin-layout>
</x-layout>
