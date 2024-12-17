@php
    use Carbon\Carbon;
    $tanggalLahir = Carbon::parse($teacher['data']['tanggalLahir'])->format('d-m-Y');
@endphp

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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 justify-center">
                    <!-- Personal Information -->
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pribadi</h3>
                        <p class="text-gray-600"><strong>Nama:</strong> {{ $teacher['data']['name'] }}</p>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $teacher['data']['email'] ?? '-' }}</p>
                        <p class="text-gray-600"><strong>NIP:</strong> {{ $teacher['data']['teacher']['nip'] }}</p>
                        <p class="text-gray-600"><strong>Tanggal Lahir:</strong> {{ $tanggalLahir }}</p>
                        <p class="text-gray-600"><strong>Jenis Kelamin:</strong> {{ $teacher['data']['gender'] == 'MAN' ? 'Laki-laki' : 'Perempuan' }}</p>
                        <p class="text-gray-600"><strong>Gelar:</strong> {{ $teacher['data']['teacher']['gelar'] }}</p>
                        <p class="text-gray-600"><strong>Keahlian:</strong> {{ $teacher['data']['teacher']['keahlian'] }}</p>
                        <p class="text-gray-600"><strong>Fakultas:</strong> {{ $teacher['data']['teacher']['fakultas'] ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Program Studi:</strong> {{ $teacher['data']['teacher']['programStudi'] ?? '-' }}</p>
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
                                        <label for="gelar" class="block text-gray-700 font-medium">Gelar:
                                        </label>
                                        <input type="text" id="gelar" name="gelar"
                                            value="{{ $teacher['data']['teacher']['gelar'] }}"
                                            class="w-full border-gray-300 p-3 rounded-lg shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="keahlian" class="block text-gray-700 font-medium">Keahlian:
                                        </label>
                                        <input type="text" id="keahlian" name="keahlian"
                                            value="{{ $teacher['data']['teacher']['keahlian'] }}"
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
                const gelar = e.target.gelar.value;
                const keahlian = e.target.keahlian.value;
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.patch('http://localhost:3000/api/teacher', {
                        name,
                        email,
                        keahlian,
                        gelar
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
