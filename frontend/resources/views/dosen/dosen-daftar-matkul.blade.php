<x-dosen-layout :teacher="$teacher">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-xl text-center font-bold mb-4">Mata Kuliah Asuh</h1>
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">No.</th>
                            <th class="border border-gray-300 px-4 py-2">Kode MK</th>
                            <th class="border border-gray-300 px-4 py-2">Nama MK</th>
                            <th class="border border-gray-300 px-4 py-2">Kelas</th>
                            <th class="border border-gray-300 px-4 py-2">Cetak Nilai</th>
                            <th class="border border-gray-300 px-4 py-2">Input Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teacher['data']['teacher']['schedules'] as $key => $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $key + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="{{ route('dosen.input-nilai', ['scheduleId' => $schedule['id']]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded inline-block">
                                        {{ $schedule['course']['code'] }}
                                    </a>                                                                        
                                </td>
                                <td class="border border-gray-300 px-4 py-2">{{ $schedule['course']['name'] }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $schedule['room'] }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="{{ route('dosen.cetak-nilai', ['kode_mk' => $schedule['course']['code']]) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block">
                                        Cetak
                                    </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="{{ route('dosen.input-nilai', ['scheduleId' => $schedule['id']]) }}" class="bg-green-500 text-white px-4 py-2 rounded inline-block">Input Nilai</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
