{{-- {{ dd($absences) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5" x-data>

            <div class="max-w-6xl mx-auto p-6">
                <a href="/dosen/sivitas" class="flex items-center text-gray-400 hover:text-gray-300 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>


                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $schedule['data']['course']['name'] }}</h1>
                        <p class="text-gray-600">{{ $schedule['data']['course']['code'] }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">{{ $schedule['data']['teacher']['user']['name'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b grid grid-cols-2">
                        <h2 class="text-lg font-semibold text-gray-800">Riwayat Kehadiran & Input Nilai</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <form method="POST" action="{{ route('dosen.input-nilai', $schedule['data']['id']) }}">
                            @csrf
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pertemuan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Kehadiran</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Tugas</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai UTS</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai UAS</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($absences['data'] as $absence)
                                        @foreach ($absence['students'] as $student)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 text-sm text-gray-500">{{ $absence['pertemuan'] }}</td>
                                                <td class="px-6 py-4 text-sm text-gray-500">{{ $student['name'] }} ({{ $student['nim'] }})</td>
                                                <td class="px-6 py-4">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                        @if ($student['status'] === 'HADIR') bg-green-100 text-green-800
                                                        @elseif ($student['status'] === 'ALPA') bg-red-100 text-red-800
                                                        @elseif ($student['status'] === 'SAKIT') bg-blue-100 text-blue-800
                                                        @elseif ($student['status'] === 'IZIN') bg-yellow-100 text-yellow-800
                                                        @endif">
                                                        {{ $student['status'] }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number" name="nilai_tugas[{{ $student['id'] }}]" 
                                                           class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                           min="0" max="100" placeholder="Nilai Tugas">
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number" name="nilai_uts[{{ $student['id'] }}]" 
                                                           class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                           min="0" max="100" placeholder="Nilai UTS">
                                                </td>
                                                <td class="px-6 py-4">
                                                    <input type="number" name="nilai_uas[{{ $student['id'] }}]" 
                                                           class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                                                           min="0" max="100" placeholder="Nilai UAS">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-right mt-4">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                                    Simpan Nilai
                                </button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </main>
    </x-dosen-layout>
    <x-dosen-absen-modal />
</x-layout>
