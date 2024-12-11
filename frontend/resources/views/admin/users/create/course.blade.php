<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Mata Kuliah</h2>
                </div>

                <form action="" method="" class="space-y-4" id="courseForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Nama Matkul</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Kode Matkul</label>
                            <input type="text" name="code"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
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

                        <div>
                            <label class="block text-base font-medium text-gray-700">Jumlah SKS</label>
                            <select name="sks" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Semester</label>
                            <select name="semester" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <option value="semester_1">Semester 1</option>
                                <option value="semester_2">Semester 2</option>
                                <option value="semester_3">Semester 3</option>
                                <option value="semester_4">Semester 4</option>
                                <option value="semester_5">Semester 5</option>
                                <option value="semester_6">Semester 6</option>
                                <option value="semester_7">Semester 7</option>
                                <option value="semester_8">Semester 8</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Program Studi</label>
                            <input type="text" name="program_studi"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                        <a href="/admin/users"
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
    </x-admin-sidebar>

    <script>
        const form = document.querySelector('#courseForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.querySelector('input[name="name"]').value;
            const code = document.querySelector('input[name="code"]').value;
            const teacherId = document.querySelector('select[name="teacher"]').value;
            const sks = document.querySelector('select[name="sks"]').value;
            const semester = document.querySelector('select[name="semester"]').value;
            const programStudi = document.querySelector('input[name="program_studi"]').value;

            try {
                const token = await axios.post('/token/get-token').then(res => res.data);
                const response = await axios.post('http://localhost:3000/api/course/create', {
                    name,
                    code,
                    teacherId: parseInt(teacherId),
                    sks: parseInt(sks),
                    semester,
                    programStudi,
                }, {
                    headers: {
                        'X-API-TOKEN': token
                    }
                }).then(data => data.data);
                if (response.status === 201) {
                    alert('Success Create New Course');
                    window.location.replace('http://127.0.0.1:8000/admin/course')
                }
            } catch (error) {
                console.log(error);
            }
        })
    </script>
</x-admin-layout>
