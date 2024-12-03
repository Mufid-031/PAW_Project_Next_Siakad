<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Main Calendar Section -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Header -->
                    <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Manajemen Jadwal</h1>
                            <p class="text-gray-600">{{ date('F Y') }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
                                Today
                            </button>
                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Calendar View -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="grid grid-cols-7 gap-px">
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                <div class="bg-white p-3 text-center text-sm font-semibold">
                                    {{ $day }}
                                </div>
                            @endforeach
                        </div>
                        <div class="grid grid-cols-7 gap-px">
                            @for ($i = 1; $i <= 31; $i++)
                                <div class="min-h-[120px] bg-white p-2 hover:bg-gray-50">
                                    <div class="text-sm text-gray-600">{{ $i }}</div>
                                    @if ($i % rand(1, 5) == 3)
                                        <div class="mt-1 border border-ultramarine-800 rounded-sm">
                                            <div class="text-xs bg-blue-100 text-blue-800 rounded p-1 mb-1">
                                                Pemrograman Web
                                                <span class="block font-semibold">Kuota: 30/40</span>
                                            </div>
                                            <div class="text-xs bg-green-100 text-green-800 rounded p-1">
                                                Basis Data
                                                <span class="block font-semibold">Kuota: 25/35</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Side Panel -->
                <div class="space-y-6">
                    <div class="bg-white rounded-lg shadow p-4">
                        <button
                            class="w-full px-4 py-2 bg-ultramarine-400 hover:bg-ultramarine-900 text-white rounded-lg mb-3">
                            <i class="fas fa-plus mr-2"></i> Tambah Kelas
                        </button>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm">
                                Hari Ini
                            </button>
                            <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm">
                                Minggu Ini
                            </button>
                            <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm">
                                Bulan Ini
                            </button>
                        </div>
                    </div>

                    <!-- Today's Schedule -->
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-ultramarine-400"></i>
                            Jadwal Hari Ini
                        </h2>
                        <div class="space-y-3">
                            @foreach (['08:00', '10:30', '13:00', '15:30'] as $time)
                                <div
                                    class="p-3 border rounded-lg hover:bg-gray-50 cursor-pointer transition duration-150">
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gray-700">{{ $time }}</span>
                                        <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">
                                            Aktif
                                        </span>
                                    </div>
                                    <div class="mt-2">
                                        <p class="font-medium">Pemrograman Web</p>
                                        <p class="text-sm text-gray-600">Lab Komputer 301</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="bg-white rounded-lg shadow p-4">
                        <h2 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="fas fa-clock mr-2 text-ultramarine-400"></i>
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
