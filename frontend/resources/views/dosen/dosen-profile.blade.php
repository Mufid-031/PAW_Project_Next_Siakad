<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Profil Dosen
                    </h1>
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-1 gap-5 justify-center">
                    <!-- Personal Information -->
                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center space-x-3 mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-800">Informasi Akademik</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">Nama</span>
                                <span class="w-2/3 font-medium">{{ $teacher['data']['name'] }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">Email</span>
                                <span class="w-2/3 font-medium">{{ $teacher['data']['email'] }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">NIP</span>
                                <span class="w-2/3 font-medium">{{ $teacher['data']['teacher']['nip'] }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">Tanggal Lahir</span>
                                <span
                                    class="w-2/3 font-medium">{{ \Carbon\Carbon::parse($teacher['data']['tanggalLahir'])->setTimezone('Asia/Jakarta')->format('d F Y') }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">Jenis Kelamin</span>
                                <span
                                    class="w-2/3 font-medium">{{ $teacher['data']['gender'] == 'MAN' ? 'Laki-laki' : 'Perempuan' }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 pb-3">
                                <span class="w-1/3 text-gray-600">Keahlian</span>
                                <span
                                    class="w-2/3 font-medium">{{ $teacher['data']['teacher']['keahlian'] ?? 'Belum ditentukan'}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="mt-6 text-center">
                    <button onclick="toggleModal()"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Edit Profil
                    </button>
                </div>
            </div>
        </main>

        <!-- Modal -->
        <div id="editModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Edit Profil
                                </h3>
                                <form id="edit-profile" class="mt-4 space-y-4">
                                    <div class="mb-4">
                                        <label for="name" class="block text-gray-700 font-medium">Nama:</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ $teacher['data']['name'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 font-medium">Email:</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $teacher['data']['email'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="keahlian" class="block text-gray-700 font-medium">Keahlian:
                                        </label>
                                        <input type="text" id="keahlian" name="keahlian"
                                            value="{{ $teacher['data']['teacher']['keahlian'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm"> 
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-gray-700 font-medium">Password:
                                            (opstional)</label>
                                        <input type="password" id="password" name="password"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="flex justify-end mt-5">
                                        <button type="button" onclick="toggleModal()"
                                            class="bg-red-600 hover:bg-red-500 text-white font-medium py-2 px-4 rounded-lg mr-2">
                                            Batal
                                        </button>
                                        <button type="submit" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        alert('Success Update User');
                        window.location.replace('http://127.0.0.1:8000/dosen/profile')
                    }
                } catch (error) {
                    console.log(error);
                }
            })
        </script>

        <script>
            function toggleModal() {
                const modal = document.getElementById('editModal');
                modal.classList.toggle('hidden');
            }
        </script>
    </x-dosen-layout>
</x-layout>
