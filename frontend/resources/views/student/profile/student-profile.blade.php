@php
    use Carbon\Carbon;
    $tanggalLahir = Carbon::parse($student['data']['tanggalLahir'])->format('d-m-Y');
@endphp
<x-student-layout :student="$student">
    <x-layout>
        <main class="container mx-auto px-4 py-8 max-w-6xl">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Profile Header -->
                <div class="relative bg-gradient-to-r from-blue-500 to-blue-600 p-8">
                    <div class="absolute inset-0 bg-black opacity-10"></div>
                    <div class="relative">
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-3xl font-bold text-blue-600">
                                    {{ strtoupper(substr($student['data']['name'], 0, 1)) }}
                                </span>
                            </div>
                            <h1 class="text-3xl font-bold text-white">{{ $student['data']['name'] }}</h1>
                            <p class="text-blue-100">{{ $student['data']['email'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="p-6 space-y-8">
                    <!-- Information Cards -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center space-x-3 mb-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-800">Informasi Pribadi</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">NIM</span>
                                    <span class="w-2/3 font-medium">{{ $student['data']['student']['nim'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Nama</span>
                                    <span class="w-2/3 font-medium">{{ $student['data']['name'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Email</span>
                                    <span class="w-2/3 font-medium">{{ $student['data']['email'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Jenis Kelamin</span>
                                    <span
                                        class="w-2/3 font-medium">{{ $student['data']['gender'] == 'MAN' ? 'Laki-laki' : 'Perempuan' }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Tanggal Lahir</span>
                                    <span class="w-2/3 font-medium">{{ $tanggalLahir }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Telephone</span>
                                    <span class="w-2/3 font-medium">{{ $student['data']['telephone'] }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information -->
                        <div class="bg-gray-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                            <div class="flex items-center space-x-3 mb-4">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-800">Informasi Akademik</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Dosen Pembimbing</span>
                                    <span
                                        class="w-2/3 font-medium">{{ $student['data']['student']['advisor']['user']['name'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Program Studi</span>
                                    <span
                                        class="w-2/3 font-medium">{{ $student['data']['student']['programStudi'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Fakultas</span>
                                    <span
                                        class="w-2/3 font-medium">{{ $student['data']['student']['fakultas'] }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">Status</span>
                                    <span
                                        class="w-2/3 font-medium">{{ strToLower($student['data']['student']['statusStudent']) }}</span>
                                </div>
                                <div class="flex border-b border-gray-200 pb-3">
                                    <span class="w-1/3 text-gray-600">IPK</span>
                                    <span class="w-2/3 font-medium">{{ $student['data']['student']['gpa'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Button -->
                    <div class="text-center pt-4">
                        <button onclick="toggleModal()"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Edit Profil
                        </button>
                    </div>
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
                                            value="{{ $student['data']['name'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-gray-700 font-medium">Email:</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $student['data']['email'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="telephone" class="block text-gray-700 font-medium">Telephone:
                                        </label>
                                        <input type="tel" id="telephone" name="telephone"
                                            value="{{ $student['data']['telephone'] }}"
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
                const telephone = e.target.telephone.value;
                const password = e.target.password.value;
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.patch('http://localhost:3000/api/student', {
                        name,
                        email,
                        password,
                        telephone
                    }, {
                        headers: {
                            'X-API-TOKEN': `${token}`
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        Swal.fire({
                            icon: "success",
                            title: "Success Edit Profile",
                            text: response.message,
                        })
                        window.location.replace('http://127.0.0.1:8000/student/profile')
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

        <script>
            function toggleModal() {
                const modal = document.getElementById('editModal');
                modal.classList.toggle('hidden');
            }
        </script>
    </x-layout>
</x-student-layout>
