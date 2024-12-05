<x-student-layout>
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
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Nama Mahasiswa</h2>
                    <p class="text-gray-600 mb-4">nim@example.com</p>
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Pribadi</h3>
                        <p class="text-gray-600"><strong>NIM:</strong> 123456789</p>
                        <p class="text-gray-600"><strong>Nama:</strong> Nama Mahasiswa</p>
                        <p class="text-gray-600"><strong>Email:</strong> nim@example.com</p>
                        <p class="text-gray-600"><strong>Jenis Kelamin:</strong> Laki-Laki</p>
                        <p class="text-gray-600"><strong>Tanggal Lahir:</strong> 11 Maret 2005</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Akademik</h3>
                        <p class="text-gray-600"><strong>Dosen Pembimbing:</strong>Calr Jhonson</p>
                        <p class="text-gray-600"><strong>Program Studi:</strong> Teknik Informatika</p>
                        <p class="text-gray-600"><strong>Fakultas:</strong> Teknik</p>
                        <p class="text-gray-600"><strong>Status:</strong> Aktif</p>
                        <p class="text-gray-600"><strong>IPK:</strong> 3.75</p>
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
                <form action="#" method="POST" class="p-4 grid grid-cols-2 gap-2" >
                    @csrf
                    @method('PUT')
                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-medium">Nama:</label>
                        <input type="text" id="nama" name="nama" value="Harits Putra Junaidi" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-gray-700 font-medium">Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email:</label>
                        <input type="email" id="email" name="email" value="nim@example.com" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <!-- Tanggal Lahir -->
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-gray-700 font-medium">Tanggal Lahir:</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="11 Maret 2005" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div></div>
                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
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
            function toggleModal() {
                const modal = document.getElementById('editModal');
                modal.classList.toggle('hidden');
            }
        </script>
    </x-layout>
</x-student-layout>