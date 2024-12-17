{{-- {{ dd($courses) }} --}}
@foreach ($courses as $key => $course)
    <div id="modal-{{ $course['id'] ?? '' }}"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-[640px] shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-semibold text-gray-900">Detail Mata Kuliah</h3>
                <button onclick="closeModal('{{ $course['id'] }}')" class="text-gray-400 hover:text-gray-500">
                    <x-ionicon-close-outline class="w-6 h-6" />
                </button>
            </div>
            <div class="mt-4 space-y-4">
                <div class="grid grid-cols-3 gap-4">
                    <x-course-detail label="Kode Mata Kuliah" :value="$course['code']" />
                    <x-course-detail label="Nama Mata Kuliah" :value="$course['name']" />
                    <x-course-detail label="SKS" :value="$course['sks']" />
                    <x-course-detail label="Program Studi" :value="$course['programStudi']" />
                    <x-course-detail label="Deskripsi" :value="'Belum ada deskripsi'" />
                </div>

                <div class="grid grid-cols-3 gap-4">
                    @forelse ($course['schedule'] as $schedule)
                        <x-course-detail label="Jadwal Kelas" :value="$schedule['time']" />
                        <x-course-detail label="Ruangan" :value="$schedule['room']" />
                        <x-course-detail label="Hari" :value="$schedule['day']" />
                    @empty
                        <x-course-detail label="Jadwal Kelas" :value="'Belum ditentukan'" />
                        <x-course-detail label="Ruangan" :value="'Belum ditentukan'" />
                        <x-course-detail label="Hari" :value="'Belum ditentukan'" />
                    @endforelse
                </div>
            </div>

            <div class="text-right mt-6">
                <button onclick="closeModal('{{ $course['id'] }}')"
                    class="px-4 py-2 bg-ultramarine-500 text-white text-sm font-medium rounded-md hover:bg-ultramarine-700">
                    Tutup
                </button>
            </div>
        </div>
    </div>
@endforeach


@once
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }
    </script>
@endonce
