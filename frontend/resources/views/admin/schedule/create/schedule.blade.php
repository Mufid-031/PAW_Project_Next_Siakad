{{-- {{ dd($courses) }} --}}
<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Jadwal Kelas</h2>
                </div>

                <form class="space-y-4" id="scheduleForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Nama Buku</label>
                            <select name="course" id="course"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                @foreach ($courses['data'] as $course)
                                    <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Hari</label>
                            <select name="day" id="day"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <option value="SUNDAY">Senin</option>
                                <option value="MONDAY">Selasa</option>
                                <option value="TUESDAY">Rabu</option>
                                <option value="WEDNESDAY">Kamis</option>
                                <option value="THURSDAY">Jumat</option>
                                <option value="FRIDAY">Sabtu</option>
                                <option value="SATURDAY">Minggu</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Ruangan</label>
                            <input type="text" name="room" id="room"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Waktu</label>
                            <div class="flex items-center gap-2">
                                <input type="time" name="timeStart" id="timeStart"
                                    class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <span class="mt-1">-</span>
                                <input type="time" name="timeEnd" id="timeEnd"
                                    class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                            </div>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Dosen Pengajar</label>
                            <select name="teacher" id="dosen_pembimbing"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                @foreach ($teachers['data'] as $teacher)
                                    <option value="{{ $teacher['teacher']['id'] }}">{{ $teacher['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                            <a href="/admin/schedule"
                                class="px-6 py-2.5 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2.5 bg-ultramarine-400 text-white rounded-md hover:bg-ultramarine-900 transition-colors">
                                Simpan
                            </button>
                        </div>
                </form>
            </div>
        </div>

        <script>
            const form = document.querySelector('#scheduleForm');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const courseId = e.target.course.value;
                const day = e.target.day.value;
                const room = e.target.room.value;
                const timeStart = e.target.timeStart.value;
                const timeEnd = e.target.timeEnd.value;
                const time = `${timeStart}-${timeEnd}`;
                const teacherId = e.target.teacher.value;

                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.post('http://localhost:3000/api/schedule/create', {
                        courseId: parseInt(courseId),
                        day,
                        room,
                        time,
                        teacherId: parseInt(teacherId),
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }   
                    }).then(data => data.data);
                    if (response.status === 201) {
                        alert('Success Create New Schedule');
                        window.location.replace('http://127.0.0.1:8000/admin/schedule')
                    }
                } catch (error) {
                    console.log(error);
                }
            })
        </script>
    </x-admin-sidebar>
</x-admin-layout>
