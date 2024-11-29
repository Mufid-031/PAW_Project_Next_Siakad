<x-admin-layout>
    <x-admin-sidebar>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Profile Card -->
                @foreach ($teachers['data'] as $key => $teacher)
                    <div class="bg-white p-6 rounded-lg shadow-md relative">
                        <h2 class="text-xl font-semibold mb-4">Profil Dosen {{ $key+1 }}</h2>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <x-ionicon-person-circle-outline class="w-6 h-6 text-ultramarine-900" />
                                <span>{{ $teacher['name'] }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <x-ionicon-card-outline class="w-6 h-6 text-ultramarine-900" />
                                <span>NIP: {{ $teacher['teacher']['nip'] }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <x-ionicon-school-outline class="w-6 h-6 text-ultramarine-900" />
                                <span>Fakultas Teknik</span>
                            </div>
                            <button type="button"
                                class="text-white bg-ultramarine-900 hover:bg-ultramarine-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center me-2 mb-2 absolute right-4 bottom-4">Detail
                            </button>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Menu Cepat</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <button
                            class="p-4 bg-ultramarine-900 text-white rounded-lg hover:bg-ultramarine-800 transition">
                            Input Nilai
                        </button>
                        <button
                            class="p-4 bg-ultramarine-900 text-white rounded-lg hover:bg-ultramarine-800 transition">
                            Absensi
                        </button>
                        <button
                            class="p-4 bg-ultramarine-900 text-white rounded-lg hover:bg-ultramarine-800 transition">
                            Materi
                        </button>
                        <button
                            class="p-4 bg-ultramarine-900 text-white rounded-lg hover:bg-ultramarine-800 transition">
                            Tugas
                        </button>
                    </div>
                </div> --}}

                <!-- Teaching Schedule Card -->
                {{-- <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Jadwal Mengajar</h2>
                    <div class="space-y-3">
                        <div class="p-3 bg-gray-50 rounded-md">
                            <p class="font-medium">Pemrograman Web</p>
                            <p class="text-sm text-gray-600">Senin, 08:00 - 10:30</p>
                            <p class="text-sm text-gray-600">Ruang Lab 301</p>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-md">
                            <p class="font-medium">Basis Data</p>
                            <p class="text-sm text-gray-600">Rabu, 13:00 - 15:30</p>
                            <p class="text-sm text-gray-600">Ruang 401</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
