@props(['students' => null, 'teachers' => null, 'courses' => null, 'schedules' => null])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Statistik Mahasiswa -->
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex items-center gap-3">
            <x-ionicon-people-outline class="w-8 h-8 text-ultramarine-900" />
            <div>
                <h3 class="text-gray-500">Total Mahasiswa</h3>
                <p class="text-2xl font-bold">{{ count($students['data'] ?? []) }}</p>
            </div>
        </div>
    </div>

    <!-- Statistik Dosen -->
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex items-center gap-3">
            <x-ionicon-school-outline class="w-8 h-8 text-ultramarine-900" />
            <div>
                <h3 class="text-gray-500">Total Dosen</h3>
                <p class="text-2xl font-bold">{{ count($teachers['data'] ?? []) }}</p>
            </div>
        </div>
    </div>

    <!-- Statistik Mata Kuliah -->
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex items-center gap-3">
            <x-ionicon-book-outline class="w-8 h-8 text-ultramarine-900" />
            <div>
                <h3 class="text-gray-500">Mata Kuliah Aktif</h3>
                <p class="text-2xl font-bold">{{ count($courses['data'] ?? []) }}</p>
            </div>
        </div>
    </div>

    <!-- Statistik Kelas -->
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex items-center gap-3">
            <x-ionicon-calendar-outline class="w-8 h-8 text-ultramarine-900" />
            <div>
                <h3 class="text-gray-500">Kelas Aktif</h3>
                <p class="text-2xl font-bold">{{ count($schedules['data'] ?? []) }}</p>
            </div>
        </div>
    </div>
</div>
