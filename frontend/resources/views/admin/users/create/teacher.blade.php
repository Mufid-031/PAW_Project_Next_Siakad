<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Akun Teacher</h2>
                    <p class="text-sm text-gray-500">Kelola administrator Anda dengan mudah dari sini</p>
                </div>

                <form id="teacherForm" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Nama</label>
                            <input type="text" name="name"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Email</label>
                            <input type="email" name="email"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">NIP</label>
                            <input type="text" name="nip"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Password</label>
                            <input type="password" name="password"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="date"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-base font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="gender" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
                                <option value="MAN">Male</option>
                                <option value="WOMAN">Female</option>
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
            const form = document.querySelector('#teacherForm');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = e.target.name.value;
                const email = e.target.email.value;
                const nip = e.target.nip.value;
                const password = e.target.password.value;
                const tanggalLahir = e.target.date.value;
                const gender = e.target.gender.value;
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.post('http://localhost:3000/api/teacher/register', {
                        name,
                        email,
                        nip,
                        password,
                        tanggalLahir,
                        gender
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message,
                        })
                        window.location.replace('/admin/users')
                    }
                } catch (error) {
                    swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response.data.errors || error.message,
                    })
                }
            })
        </script>
    </x-admin-sidebar>
</x-admin-layout>
