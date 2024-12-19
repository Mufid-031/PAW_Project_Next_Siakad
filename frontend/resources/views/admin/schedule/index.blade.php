<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="lg:col-span-3 space-y-6">
                    <div
                        class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Manajemen Jadwal</h1>
                            <p class="text-gray-600 mt-2 font-medium">{{ date('F Y') }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="border-b bg-gray-50/80 rounded-t-2xl">
                            <nav class="flex flex-wrap px-2">
                                @foreach (['SUNDAY' => 'Minggu', 'MONDAY' => 'Senin', 'TUESDAY' => 'Selasa', 'WEDNESDAY' => 'Rabu', 'THURSDAY' => 'Kamis', 'FRIDAY' => 'Jumat', 'SATURDAY' => 'Sabtu'] as $dayKey => $dayName)
                                    <button onclick="showDay('{{ $dayKey }}')"
                                        class="tab-button px-6 py-4 text-sm font-medium transition-all duration-200 border-b-2 hover:bg-white/80 {{ $dayKey === strtoupper(now()->englishDayOfWeek) ? 'border-blue-600 text-blue-600 bg-white' : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}"
                                        data-target="{{ $dayKey }}">
                                        {{ $dayName }}
                                    </button>
                                @endforeach
                            </nav>
                        </div>

                        @foreach (['SUNDAY' => 'Minggu', 'MONDAY' => 'Senin', 'TUESDAY' => 'Selasa', 'WEDNESDAY' => 'Rabu', 'THURSDAY' => 'Kamis', 'FRIDAY' => 'Jumat', 'SATURDAY' => 'Sabtu'] as $dayKey => $dayName)
                            @php
                                $daySchedules = collect($schedules['data'])->filter(function ($schedule) use ($dayKey) {
                                    return $schedule['day'] === $dayKey;
                                });
                            @endphp

                            <div id="{{ $dayKey }}"
                                class="schedule-content {{ $dayKey === strtoupper(now()->englishDayOfWeek) ? 'block' : 'hidden' }}">
                                <div class="divide-y divide-gray-100">
                                    @if ($daySchedules->count() > 0)
                                        @foreach ($daySchedules->sortBy('time') as $schedule)
                                            <div
                                                class="p-6 flex items-center justify-between hover:bg-blue-50/50 transition-colors duration-200">
                                                <div class="flex-1">
                                                    <div
                                                        class="text-base font-semibold text-gray-900 flex items-center">
                                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                        {{ $schedule['course']['name'] }}
                                                    </div>
                                                    <div class="text-sm text-gray-600 mt-2 flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                        </svg>
                                                        {{ $schedule['room'] }}
                                                    </div>
                                                </div>
                                                <div class="flex-1 text-sm font-medium text-gray-900 flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $schedule['time'] }}
                                                </div>
                                                <div class="flex items-center">
                                                    <span
                                                        class="px-4 py-1.5 text-sm font-semibold rounded-full {{ count($schedule['enrollments']) >= $schedule['kouta'] ? 'bg-red-100 text-red-800' : 'bg-emerald-100 text-emerald-800' }}">
                                                        {{ count($schedule['enrollments']) }}/{{ $schedule['kouta'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="px-6 py-12 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            <p class="mt-2 text-gray-500 font-medium">Tidak ada jadwal untuk hari ini
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-md p-5 hover:shadow-lg transition-shadow duration-300">
                        <a href="/admin/schedule/create/schedule">
                            <button
                                class="w-full px-4 py-3 bg-ultramarine-300 hover:bg-ultramarine-400 text-white rounded-xl mb-3 flex items-center justify-center font-medium transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Tambah Kelas
                            </button>
                        </a>
                        <a href="/admin/schedule/open-class">
                            <button
                                class="w-full px-4 py-3 bg-ultramarine-300 hover:bg-ultramarine-400 text-white rounded-xl flex items-center justify-center font-medium transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                </svg>
                                Buka Kelas
                            </button>
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                        <h2 class="text-lg font-semibold mb-4 flex items-center text-gray-800">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Jadwal Hari Ini
                        </h2>
                        <div
                            class="space-y-3 max-h-[400px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            @php
                                $todaySchedules = collect($schedules['data'])
                                    ->filter(function ($schedule) {
                                        return $schedule['day'] === strtoupper(now()->englishDayOfWeek);
                                    })
                                    ->sortBy('time');
                            @endphp

                            @forelse($todaySchedules as $schedule)
                                <div class="p-4 border rounded-xl hover:bg-blue-50/50 transition duration-200">
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $schedule['time'] }}
                                        </span>
                                        <span
                                            class="text-xs px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full font-medium">
                                            Aktif
                                        </span>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-medium text-gray-900">{{ $schedule['course']['name'] }}</p>
                                        <p class="text-sm text-gray-600 mt-1 flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            {{ $schedule['room'] }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-500">Tidak ada jadwal hari ini</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>

    <script>
        function showDay(dayId) {
            document.querySelectorAll('.schedule-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.getElementById(dayId).classList.remove('hidden');
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-ultramarine-500', 'text-ultramarine-600');
                button.classList.add('border-transparent', 'text-gray-500');
            });

            const activeButton = document.querySelector(`[data-target="${dayId}"]`);
            activeButton.classList.remove('border-transparent', 'text-gray-500');
            activeButton.classList.add('border-ultramarine-500', 'text-ultramarine-600');
        }
    </script>
</x-admin-layout>
