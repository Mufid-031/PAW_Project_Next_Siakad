@php
    use Carbon\Carbon;
    $tanggalLahir = Carbon::parse($teacher['data']['tanggalLahir'])->format('d-m-Y');
@endphp

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
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pribadi</h3>
                        <p class="text-gray-600"><strong>Nama:</strong> {{ $teacher['data']['name'] }}</p>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $teacher['data']['email'] ?? '-' }}</p>
                        <p class="text-gray-600"><strong>NIP:</strong> {{ $teacher['data']['teacher']['nip'] }}</p>
                        <p class="text-gray-600"><strong>Tanggal Lahir:</strong> {{ $tanggalLahir }}</p>
                        <p class="text-gray-600"><strong>Jenis Kelamin:</strong> {{ $teacher['data']['gender'] == 'MAN' ? 'Laki-laki' : 'Perempuan' }}</p>
                        <p class="text-gray-600"><strong>Alamat:</strong> {{ $teacher['data']['address'] ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Telephone:</strong> {{ $teacher['data']['telephone'] ?? '-' }}</p>
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
                        <input type="text" id="status_ikatan_kerja" name="status_ikatan_kerja" value="Dosen Tetap"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
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
