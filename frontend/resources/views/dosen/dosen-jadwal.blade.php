{{-- {{ dd($teacher) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Jadwal Mengajar
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah jadwal mata kuliah.
                    </p>
                </div>

                <!-- Schedule Table -->
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full table-auto">                
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    No</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Kode Kelas</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Mata Kuliah</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Jadwal</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teacher['data']['teacher']['schedules'] as $key => $schedule)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                        {{ $key + 1 }}</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                        {{ $schedule['course']['code'] }}</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                        {{ $schedule['course']['name'] }}</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($schedule['day'])->locale('id')->dayName }}, {{ $schedule['time'] }}</td>
                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                        {{ $schedule['room'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="border border-gray-200 px-4 py-3 text-center text-sm text-gray-600">Tidak
                                        ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </x-dosen-layout>
</x-layout>
