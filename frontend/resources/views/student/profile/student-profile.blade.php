{{-- {{ dd($student) }} --}}
@php
    use Carbon\Carbon;
    $tanggalLahir = Carbon::parse($student['data']['tanggalLahir'])->format('d-m-Y');
@endphp
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Profil Mahasiswa
                    </h1>
                </div>

                <!-- Profile Information -->
                <div class="flex flex-col items-center">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $student['data']['name'] }}</h2>
                    <p class="text-gray-600 mb-4">{{ $student['data']['email'] }}</p>
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pribadi</h3>
                        <p class="text-gray-600"><strong>NIM:</strong> {{ $student['data']['student']['nim'] }}</p>
                        <p class="text-gray-600"><strong>Nama:</strong> {{ $student['data']['name'] }}</p>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $student['data']['email'] }}</p>
                        <p class="text-gray-600"><strong>Jenis Kelamin:</strong> {{ $student['data']['gender'] }}</p>
                        <p class="text-gray-600"><strong>Tanggal Lahir:</strong> {{ $tanggalLahir}}</p>
                        <p class="text-gray-600"><strong>Telephone:</strong> {{ $student['data']['telephone'] }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Akademik</h3>
                        <p class="text-gray-600"><strong>Dosen Pembimbing:</strong> {{ $student['data']['student']['academicAdvisorId']}}</p>
                        <p class="text-gray-600"><strong>Program Studi:</strong> {{ $student['data']['student']['programStudi']}}</p>
                        <p class="text-gray-600"><strong>Fakultas:</strong> {{ $student['data']['student']['fakultas']}}</p>
                        <p class="text-gray-600"><strong>Status:</strong> {{ $student['data']['student']['statusStudent']}}</p>
                        <p class="text-gray-600"><strong>IPK:</strong> {{ $student['data']['student']['gpa']}}</p>
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="mt-6 text-center">
                    <button onclick="toggleModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Edit Profil
                    </button>
                </div>
            </div>
        </main>

        <!-- Modal -->
        <div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-1/3">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-bold text-gray-800">Edit Profil</h2>
                </div>
                <form id="edit-profile" class="p-4 grid grid-cols-2 gap-2" >
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium">Nama:</label>
                        <input type="text" id="name" name="name" value="{{ $student['data']['name'] }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $student['data']['email'] }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Telepon -->
                    <div class="mb-4">
                        <label for="telephone" class="block text-gray-700 font-medium">Telephone: </label>
                        <input type="tel" id="telephone" name="telephone" value="{{ $student['data']['telephone'] }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium">Password: (opstional)</label>
                        <input type="password" id="password" name="password" class="w-full border-gray-300 rounded-lg shadow-sm">
                    <div></div>
                    <!-- Tombol Simpan -->
                    <div class="flex justify-end mt-5">
                        <button type="button" onclick="toggleModal()" class="bg-red-600 hover:bg-red-500 text-white font-medium py-2 px-4 rounded-lg mr-2">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const form = document.querySelector('#edit-profile');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = document.querySelector('#name').value;
                const email = document.querySelector('#email').value;
                const password = document.querySelector('#password').value;
                const telephone = document.querySelector('#telephone').value;
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    console.log(token);
                    const response = await axios.patch('http://localhost:3000/api/student', {
                        name,
                        email,
                        password,
                        telephone
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        alert('Success Update User');
                        window.location.replace('http://127.0.0.1:8000/student/profile')
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
    </x-layout>
</x-student-layout>