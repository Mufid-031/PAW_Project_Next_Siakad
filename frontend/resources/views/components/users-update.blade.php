<div x-data="{ isOpen: false, user: null }" x-show="isOpen" @update-modal.window="isOpen = true; user = $event.detail.user">
    <div x-show="isOpen" class="fixed inset-0 z-50 overflow-y-auto" x-transition.opacity x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity" @click="isOpen = false"></div>

            <div class="relative bg-gray-50 rounded-lg w-full max-w-md p-6 shadow-xl">
                <div class="flex justify-between items-center mb-4 border-b border-gray-200 pb-3">
                    <h3 class="text-lg font-semibold text-gray-800">Update Users</h3>
                    <button @click="isOpen = false" class="text-gray-600 hover:text-gray-800">
                        <x-ionicon-close-outline class="w-6 h-6" />
                    </button>
                </div>

                <form id="updateForm" class="space-y-4">
                    <div>
                        <input x-model="user?.id" type="hidden" name="id" id="id">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Nama</label>
                        <input x-model="user?.name" type="text" id="name" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-2 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Email</label>
                        <input x-model="user?.email" type="email" id="email" name="email"
                            class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-2 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Role</label>
                        <select disabled id="role" name="role"
                            class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-2 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
                            <option :selected="user?.role === 'ADMIN'" value="ADMIN">Admin</option>
                            <option :selected="user?.role === 'TEACHER'" value="TEACHER">Teacher</option>
                            <option :selected="user?.role === 'STUDENT'" value="STUDENT">Student</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-800">Password Baru (Optional)</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full rounded-md border-gray-300 bg-ultramarine-200 p-2 focus:border-ultramarine-500 focus:ring-ultramarine-500 shadow-sm">
                    </div>

                    <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                        <button type="button" @click="isOpen = false"
                            class="px-6 py-2.5 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-ultramarine-400 text-white rounded-md hover:bg-ultramarine-900 transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.querySelector('#updateForm');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = e.target.id.value;
        const name = e.target.name.value;
        const email = e.target.email.value;
        const role = e.target.role.value;
        const password = e.target.password.value;
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            const response = await axios.patch('http://localhost:3000/api/admin/user', {
                id: parseInt(id),
                role,
                name,
                email,
                password
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
                window.location.replace('/admin/users')
            }
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: error.response.data.errors || error.message,
            })
        }
    })
</script>
