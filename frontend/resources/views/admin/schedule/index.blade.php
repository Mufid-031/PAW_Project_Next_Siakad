<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3 space-y-8">
                    <div class="flex justify-between items-center bg-white p-6 rounded-xl shadow-sm">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Manajemen Jadwal</h1>
                            <p class="text-gray-600 mt-1">{{ date('F Y') }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="border-b bg-gray-50">
                            <nav class="flex flex-wrap px-4">
                                @foreach (['SUNDAY' => 'Minggu', 'MONDAY' => 'Senin', 'TUESDAY' => 'Selasa', 'WEDNESDAY' => 'Rabu', 'THURSDAY' => 'Kamis', 'FRIDAY' => 'Jumat', 'SATURDAY' => 'Sabtu'] as $dayKey => $dayName)
                                    <button onclick="showDay('{{ $dayKey }}')"
                                        class="tab-button px-6 py-4 text-sm font-medium transition-all duration-200 border-b-2 {{ $dayKey === strtoupper(now()->englishDayOfWeek) ? 'border-ultramarine-500 text-ultramarine-600 bg-white' : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' }}"
                                        data-target="{{ $dayKey }}">
                                        {{ $dayName }}
                                    </button>
                                @endforeach
                            </nav>
                        </div>

                        <!-- Schedule Content -->
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
                                                class="p-6 flex items-center justify-between hover:bg-gray-50 transition-colors duration-150">
                                                <div class="flex-1">
                                                    <div class="text-base font-semibold text-gray-900">
                                                        {{ $schedule['course']['name'] }}
                                                    </div>
                                                    <div class="text-sm text-gray-600 mt-1">
                                                        <span class="inline-flex items-center">
                                                            <svg class="w-4 h-4 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                            </svg>
                                                            {{ $schedule['room'] }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-1 text-sm font-medium text-gray-900">
                                                    {{ $schedule['time'] }}
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span
                                                        class="px-3 py-1 text-sm font-semibold rounded-full {{ count($schedule['enrollments']) >= $schedule['kouta'] ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                                        {{ count($schedule['enrollments']) }}/{{ $schedule['kouta'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="px-6 py-8 text-center">
                                            <div class="text-gray-500">Tidak ada jadwal untuk hari ini</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white rounded-lg shadow p-4">
                        <a href="/admin/schedule/create/schedule">
                            <button
                                class="w-full px-4 py-2 bg-ultramarine-400 hover:bg-ultramarine-900 text-white rounded-lg mb-3">
                                Tambah Kelas
                            </button>
                        </a>
                        <a href="">
                            <button
                                class="w-full px-4 py-2 bg-ultramarine-400 hover:bg-ultramarine-900 text-white rounded-lg mb-3">
                                Buka Kelas
                            </button>
                        </a>
                    </div>

                    <!-- Today Schedule Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold mb-4 flex items-center text-gray-800">
                            <svg class="w-5 h-5 mr-2 text-ultramarine-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Jadwal Hari Ini
                        </h2>
                        <div
                            class="space-y-3 max-h-[300px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            @php
                                $todaySchedules = collect($schedules['data'])
                                    ->filter(function ($schedule) {
                                        return $schedule['day'] === strtoupper(now()->englishDayOfWeek);
                                    })
                                    ->sortBy('time');
                            @endphp

                            @forelse($todaySchedules as $schedule)
                                <div class="p-3 border rounded-lg hover:bg-gray-50 transition duration-150">
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-700">{{ $schedule['time'] }}</span>
                                        <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">
                                            Aktif
                                        </span>
                                    </div>
                                    <div class="mt-2">
                                        <p class="font-medium">{{ $schedule['course']['name'] }}</p>
                                        <p class="text-sm text-gray-600">{{ $schedule['room'] }}</p>
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
