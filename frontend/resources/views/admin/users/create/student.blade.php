{{-- {{ dd($teachers) }} --}}

<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Akun Student</h2>
                    <p class="text-sm text-gray-500">Kelola administrator Anda dengan mudah dari sini</p>
                </div>

                <form id="studentForm" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Nama</label>
                            <input type="text" id="studName" name="name"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">NIM</label>
                            <input type="text" id="nim" name="nim"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Email</label>
                            <input type="email" id="studEmail" name="email"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Password</label>
                            <input type="password" id="studPwd" name="password"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-base font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" id="date" name="date"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="gender" id="gender"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <option value="MAN">Male</option>
                                <option value="WOMAN">Female</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Program Studi</label>
                            <input id="program_studi" type="text" name="program_studi"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Dosen Pembimbing</label>
                            <select name="dosen_pembimbing" id="dosen_pembimbing" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                @foreach ($teachers['data'] as $teacher)
                                    <option value="{{ $teacher['teacher']['id'] }}">{{ $teacher['name'] }}</option>
                                @endforeach

                            </select>
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

        <script>
            const form = document.querySelector('#studentForm');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = e.target.name.value;
                const nim = e.target.nim.value;
                const email = e.target.email.value;
                const password = e.target.password.value;
                const tanggalLahir = e.target.date.value;
                const gender = e.target.gender.value;
                const programStudi = e.target.program_studi.value;
                const academicAdvisorId = e.target.dosen_pembimbing.value;
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.post('http://localhost:3000/api/student/register', {
                        name,
                        nim,
                        email,
                        password,
                        tanggalLahir,
                        gender,
                        programStudi,
                        academicAdvisorId: parseInt(academicAdvisorId),
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        alert('Success Create New Student');
                        window.location.replace('http://127.0.0.1:8000/admin/users')
                    }
                } catch (error) {
                    console.log(error);
                }
            })
        </script>
    </x-admin-sidebar>
</x-admin-layout>
