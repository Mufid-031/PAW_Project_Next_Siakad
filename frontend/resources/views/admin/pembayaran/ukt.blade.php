
<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-4 border-2 border-gray-200 rounded-lg">
                <div class="mb-4">
                    <h2 class="text-2xl font-bold">Manajemen Akun Admin</h2>
                    <p class="text-sm text-gray-500">Kelola administrator Anda dengan mudah dari sini</p>
                </div>

                <form class="space-y-4" id="pembayaranForm">
                    <div class="flex flex-col gap-4">
                        <div>
                            <label class="block text-base font-medium text-gray-700">Total</label>
                            <input type="number" id="adminTotal" name="total"
                                class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm">
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

                    </div>
                    <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                        <a href="/admin/service"
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
            const formPembayaran = document.querySelector('#pembayaranForm');
            formPembayaran.addEventListener('submit', async (e) => {
                e.preventDefault();
                const total = e.target.total.value;
                const semester = e.target.semester.value;

                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.post('http://localhost:3000/api/pembayaran', {
                        total: parseInt(total),
                        semester
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message,
                        })
                        window.location.replace('/admin/service')
                    }
                } catch (error) {
                    console.log(error);
                }
            })
        </script>
    </x-admin-sidebar>
</x-admin-layout>
