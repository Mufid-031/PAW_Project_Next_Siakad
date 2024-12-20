{{-- {{ dd($absences) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <div class="container mx-auto p-6">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Riwayat Absensi</h1>
                <p class="text-gray-600">Kelola kehadiran mahasiswa</p>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <!-- Data Table -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NIM</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($absences['data'] as $absence)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $absence['student']['user']['name'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $absence['student']['nim'] }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($absence['updatedAt'])->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $absence['statusKehadiran'] == 'HADIR' ? 'bg-green-100 text-green-800' : '' }} {{ $absence['statusKehadiran'] == 'IZIN' ? 'bg-blue-100 text-blue-800' : '' }} {{ $absence['statusKehadiran'] == 'ALPA' ? 'bg-red-100 text-red-800' : '' }} {{ $absence['statusKehadiran'] == 'SAKIT' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                {{ $absence['statusKehadiran'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <select
                                                class="border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                                                <option value="HADIR"
                                                    {{ $absence['statusKehadiran'] == 'HADIR' ? 'selected' : '' }}>Hadir
                                                </option>
                                                <option value="IZIN"
                                                    {{ $absence['statusKehadiran'] == 'IZIN' ? 'selected' : '' }}>Izin
                                                </option>
                                                <option value="SAKIT"
                                                    {{ $absence['statusKehadiran'] == 'SAKIT' ? 'selected' : '' }}>
                                                    Sakit</option>
                                                <option value="ALPHA"
                                                    {{ $absence['statusKehadiran'] == 'ALPHA' ? 'selected' : '' }}>
                                                    Alpha</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </x-dosen-layout>
</x-layout>
