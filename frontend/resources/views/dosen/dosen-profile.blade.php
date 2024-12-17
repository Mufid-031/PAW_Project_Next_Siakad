<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Profil Dosen
                    </h1>
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                <span class="w-1/3 text-gray-600">Telephone</span>
                                <span
                                    class="w-2/3 font-medium">{{ $teacher['data']['telephone'] ?? 'Belum ditentukan' }}</span>
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
        <div id="editModal"
            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-1/3">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-bold text-gray-800">Edit Profil</h2>
                </div>
                <form action="#" method="POST" class="p-4 grid grid-cols-2 gap-2">
                    @csrf
                    @method('PUT')
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-medium">Nama:</label>
                        <input type="text" id="nama" name="nama" value="John Doe"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-gray-700 font-medium">Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Pendidikan Terakhir -->
                    <div class="mb-4">
                        <label for="pendidikan_terakhir" class="block text-gray-700 font-medium">Pendidikan
                            Terakhir:</label>
                        <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" value="S2"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Status Aktivitas -->
                    <div class="mb-4">
                        <label for="status_aktivitas" class="block text-gray-700 font-medium">Status Aktivitas:</label>
                        <input type="text" id="status_aktivitas" name="status_aktivitas" value="Aktif"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Perguruan Tinggi -->
                    <div class="mb-4">
                        <label for="perguruan_tinggi" class="block text-gray-700 font-medium">Perguruan Tinggi:</label>
                        <input type="text" id="perguruan_tinggi" name="perguruan_tinggi"
                            value="Universitas Trunojoyo" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Program Studi -->
                    <div class="mb-4">
                        <label for="program_studi" class="block text-gray-700 font-medium">Program Studi:</label>
                        <input type="text" id="program_studi" name="program_studi" value="Teknik Informatika"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Jabatan Fungsional -->
                    <div class="mb-4">
                        <label for="jabatan_fungsional" class="block text-gray-700 font-medium">Jabatan
                            Fungsional:</label>
                        <input type="text" id="jabatan_fungsional" name="jabatan_fungsional" value="Lektor"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Status Ikatan Kerja -->
                    <div class="mb-4">
                        <label for="status_ikatan_kerja" class="block text-gray-700 font-medium">Status Ikatan
                            Kerja:</label>
                        <input type="text" id="status_ikatan_kerja" name="status_ikatan_kerja"
                            value="Dosen Tetap" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div></div>
                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
                        <button type="button" onclick="toggleModal()"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg mr-2">
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

        <script>
            function toggleModal() {
                const modal = document.getElementById('editModal');
                modal.classList.toggle('hidden');
            }
        </script>
    </x-dosen-layout>
</x-layout>
