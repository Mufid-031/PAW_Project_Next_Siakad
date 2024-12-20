<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <!-- Header with Profile Banner -->
                    <div class="relative h-32 bg-gradient-to-r from-blue-600 to-blue-800">
                        <div class="absolute bottom-0 left-0 right-0 px-6 py-4">
                            <h1 class="text-3xl font-bold text-white">
                                Profil Dosen
                            </h1>
                        </div>
                    </div>

                    <!-- Profile Content -->
                    <div class="p-6">
                        <!-- Profile Card -->
                        <div class="bg-white rounded-xl overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center space-x-4 mb-6">
                                    <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                                        <span class="text-2xl font-bold text-blue-600">
                                            {{ substr($teacher['data']['name'], 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">{{ $teacher['data']['name'] }}</h2>
                                        <p class="text-gray-500">{{ $teacher['data']['teacher']['nip'] }}</p>
                                    </div>
                                </div>

                                <!-- Information Grid -->
                                <div class="space-y-6">
                                    <!-- Academic Information -->
                                    <div class="bg-gray-50 rounded-xl p-6">
                                        <div class="flex items-center space-x-3 mb-4">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            <h3 class="text-lg font-semibold text-gray-800">Informasi Akademik</h3>
                                        </div>
                                        
                                        <div class="grid gap-4">
                                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-colors">
                                                <span class="w-1/3 text-gray-600">Email</span>
                                                <span class="w-2/3 font-medium text-gray-900">{{ $teacher['data']['email'] }}</span>
                                            </div>
                                            
                                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-colors">
                                                <span class="w-1/3 text-gray-600">Tanggal Lahir</span>
                                                <span class="w-2/3 font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($teacher['data']['tanggalLahir'])->setTimezone('Asia/Jakarta')->format('d F Y') }}
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-colors">
                                                <span class="w-1/3 text-gray-600">Jenis Kelamin</span>
                                                <span class="w-2/3 font-medium text-gray-900">
                                                    {{ $teacher['data']['gender'] == 'MAN' ? 'Laki-laki' : 'Perempuan' }}
                                                </span>
                                            </div>
                                            
                                            <div class="flex items-center p-3 bg-white rounded-lg hover:bg-gray-50 transition-colors">
                                                <span class="w-1/3 text-gray-600">Keahlian</span>
                                                <span class="w-2/3 font-medium text-gray-900">
                                                    {{ $teacher['data']['teacher']['keahlian'] ?? 'Belum ditentukan'}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Button -->
                                <div class="mt-6 flex justify-center">
                                    <button onclick="toggleModal()" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit Profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="editModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <!-- Modal panel -->
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                        <h3 class="text-xl font-semibold text-gray-900 mb-4" id="modal-title">
                                            Edit Profil
                                        </h3>
                                        <form id="edit-profile" class="space-y-4">
                                            <div class="space-y-4">
                                                <div>
                                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                                        Nama
                                                    </label>
                                                    <input type="text" id="name" name="name" value="{{ $teacher['data']['name'] }}"
                                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                </div>

                                                <div>
                                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                                        Email
                                                    </label>
                                                    <input type="email" id="email" name="email" value="{{ $teacher['data']['email'] }}"
                                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                </div>

                                                <div>
                                                    <label for="keahlian" class="block text-sm font-medium text-gray-700 mb-1">
                                                        Keahlian
                                                    </label>
                                                    <input type="text" id="keahlian" name="keahlian" value="{{ $teacher['data']['teacher']['keahlian'] }}"
                                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                </div>

                                                <div>
                                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                                        Password (opsional)
                                                    </label>
                                                    <input type="password" id="password" name="password"
                                                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>

                                            <div class="flex justify-end space-x-3 mt-6">
                                                <button type="button" onclick="toggleModal()"
                                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Batal
                                                </button>
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            const form = document.querySelector('#edit-profile');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = e.target.name.value;
                const email = e.target.email.value;
                const keahlian = e.target.keahlian.value;
                const password = e.target.password.value;

                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.patch('http://localhost:3000/api/teacher', {
                        name,
                        email,
                        password,
                        keahlian
                    }, {
                        headers: {
                            'X-API-TOKEN': `${token}`
                        }
                    }).then(data => data.data);

                    if (response.status === 201) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil Update Profil",
                            text: response.message,
                        });
                        window.location.replace('http://127.0.0.1:8000/dosen/profile');
                    }
                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response.data.errors || error.message,
                    });
                }
            });

            function toggleModal() {
                const modal = document.getElementById('editModal');
                modal.classList.toggle('hidden');
            }
        </script>
    </x-dosen-layout>
</x-layout>