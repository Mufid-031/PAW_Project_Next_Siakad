<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <div class="lg:col-span-3 space-y-6">
                    <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Manajemen Jadwal</h1>
                            <p class="text-gray-600">{{ date('F Y') }}</p>
                        </div>
                    </div>

                    <!-- Table View -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        @foreach (['SUNDAY' => 'Minggu', 'MONDAY' => 'Senin', 'TUESDAY' => 'Selasa', 'WEDNESDAY' => 'Rabu', 'THURSDAY' => 'Kamis', 'FRIDAY' => 'Jumat', 'SATURDAY' => 'Sabtu'] as $dayKey => $dayName)
                            @php
                                $daySchedules = collect($schedules['data'])->filter(function ($schedule) use ($dayKey) {
                                    return $schedule['day'] === $dayKey;
                                });
                            @endphp

                            <div class="border-b last:border-b-0">
                                <!-- Day Header -->
                                <div class="bg-gray-50 px-6 py-3">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $dayName }}</h3>
                                </div>

                                <!-- Day Schedules -->
                                <div class="divide-y divide-gray-200">
                                    @if ($daySchedules->count() > 0)
                                        @foreach ($daySchedules->sortBy('time') as $schedule)
                                            <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50">
                                                <div class="flex-1">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $schedule['course']['name'] }}</div>
                                                    <div class="text-sm text-gray-500">{{ $schedule['room'] }}</div>
                                                </div>
                                                <div class="flex-1 text-sm text-gray-500">
                                                    {{ $schedule['time'] }}
                                                </div>
                                                <div class="flex-1 text-right">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{ count($schedule['enrollments']) }}/{{ $schedule['kouta'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="px-6 py-4 text-sm text-gray-500 text-center">
                                            Tidak ada jadwal
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Side Panel -->
                <div class="space-y-6">
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

                    <!-- Today's Schedule Card -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
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

                    <!-- Upcoming Events -->
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-lg font-semibold mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Jadwal Mendatang
                        </h2>
                        <div class="space-y-2">
                            @foreach (['Sempro', 'UAS', 'Semhas'] as $event)
                                <div class="p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                    <p class="font-medium">{{ $event }}</p>
                                    <p class="text-sm text-gray-600">Tomorrow, 09:00</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
