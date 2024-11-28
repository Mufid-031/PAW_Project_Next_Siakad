<x-admin-layout>
  <x-admin-sidebar>
    <div class="p-6">
            <div class="p-4">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Jadwal</h1>
                    <div class="space-x-2">
                        <button class="px-4 py-2 bg-ultramarine-400 hover:bg-ultramarine-900 text-white rounded-lg">
                            Tambahkan Jadwal Kelas
                        </button>
                    </div>
                </div>

                <!-- Calendar Grid -->
                <div class="bg-white rounded-lg shadow">
                    <!-- Calendar Header -->
                    <div class="grid grid-cols-[2fr_15fr] gap-2">
                        <div></div>
                        <div class="grid grid-cols-6 gap-2 p-4 border-b text-center">
                            <div class="font-semibold">Senin</div>
                            <div class="font-semibold">Selasa</div>
                            <div class="font-semibold">Rabu</div>
                            <div class="font-semibold">Kamis</div>
                            <div class="font-semibold">Jumat</div>
                            <div class="font-semibold">Sabtu</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-[2fr_15fr] gap-2">
                        <div class="grid grid-cols-1 p-3">
                            <div class="font-semibold p-2 flex justify-center items-center">07:00-09:30</div>
                            <div class="font-semibold p-2 flex justify-center items-center">09:00-11:30</div>
                            <div class="font-semibold p-2 flex justify-center items-center">13:00-15:30</div>
                            <div class="font-semibold p-2 flex justify-center items-center">15:30-18:00</div>
                        </div>
                        <!-- Calendar Body -->
                        <div class="grid grid-cols-5 gap-2 p-4">
                            @for ($i = 1; $i <= 20; $i++)
                                <div class="aspect-square border rounded-lg p-2 hover:bg-gray-50 cursor-pointer">
                                    {{-- <div class="text-sm">{{ $i }}</div> --}}
                                    @if ($i % 3 == 0)
                                        <div class="mt-1 text-xs bg-ultramarine-100 text-blue-800 rounded p-1">
                                            {{-- {{ rand(1, 3) }} appointments --}}
                                            <div class="space-y-1">
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
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Today's Schedule -->
                <div class="mt-6 bg-white rounded-lg shadow p-4">
                    <h2 class="text-lg font-semibold mb-4">Jadwal Hari Ini</h2>
                    <div class="space-y-3">
                        @for ($i = 9; $i <= 17; $i++)
                            <div class="flex items-center p-3 border rounded-lg {{ $i % 4 == 0 ? 'bg-blue-50' : '' }}">
                                <div class="w-24 font-medium">{{ $i }}:00</div>
                                @if ($i % 4 == 0)
                                    <div class="flex-1">
                                        <div class="font-medium text-blue-800">Sempro</div>
                                        <div class="text-sm text-gray-600">Martin</div>
                                    </div>
                                @else
                                    <div class="flex-1 text-gray-500">Available</div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
  </x-admin-sidebar>
</x-admin-layout>