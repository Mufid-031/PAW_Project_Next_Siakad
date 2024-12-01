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
                        <p class="text-gray-600"><strong>Telepon:</strong> 081234567890</p>
                        <p class="text-gray-600"><strong>Tanggal Lahir:</strong> 11 Maret 2005</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg shadow">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Akademik</h3>
                        <p class="text-gray-600"><strong>Dosen Pembimbing:</strong>-</p>
                        <p class="text-gray-600"><strong>Program Studi:</strong> Teknik Informatika</p>
                        {{-- <p class="text-gray-600"><strong>Angkatan:</strong> 2020</p> --}}
                        <p class="text-gray-600"><strong>Status:</strong> Aktif</p>
                        <p class="text-gray-600"><strong>IPK:</strong> 3.75</p>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-gray-600 mb-4">Terdapat Data yang salah?</p>
                    <a href="/student/profile/update" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">Edit</a>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>
