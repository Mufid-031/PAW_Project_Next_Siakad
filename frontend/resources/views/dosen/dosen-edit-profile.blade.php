<x-dosen-layout>
    <x-layout>
        <main class="mr-20 ml-20">
            <div class="container mx-auto p-6">
                <form method="POST" action="#">
                    @csrf
                    <!-- Input Nama Dosen -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap" value="Dr. Agus Santoso, M.T." class="mt-1 block w-full" />
                        <p class="mt-2 text-sm text-gray-500">Masukkan nama lengkap sesuai identitas Anda.</p>
                    </div>
                
                    <!-- Input NIP -->
                    <div class="mb-4">
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" placeholder="123456789" value="1987654321" class="mt-1 block w-full" />
                        <p class="mt-2 text-sm text-gray-500">NIP Anda akan digunakan sebagai identifikasi utama di sistem.</p>
                    </div>
                
                    <!-- Select Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <select name="email" id="email" class="mt-1 block w-full">
                            <option value="" disabled>Pilih email yang terverifikasi</option>
                            <option value="agus.santoso@univ.ac.id" selected>agus.santoso@univ.ac.id</option>
                            <option value="agus.santoso@gmail.com">agus.santoso@gmail.com</option>
                            <option value="agus.santoso@support.com">agus.santoso@support.com</option>
                        </select>
                        <p class="mt-2 text-sm text-gray-500">
                            Anda dapat mengatur email terverifikasi di
                            <a href="/settings/emails" class="text-blue-500">pengaturan email</a>.
                        </p>
                    </div>
                
                    <!-- Input Bio -->
                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" placeholder="Ceritakan sedikit tentang diri Anda" class="mt-1 block w-full resize-none">Dosen Teknik Informatika yang berpengalaman dalam bidang Kecerdasan Buatan dan Pembelajaran Mesin. Aktif sebagai pembimbing penelitian mahasiswa sarjana dan pascasarjana.</textarea>
                        <p class="mt-2 text-sm text-gray-500">
                            Anda dapat menggunakan <span>@mention</span> untuk menyebut pengguna atau organisasi lain.
                        </p>
                    </div>
                
                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Perbarui Profil</button>
                    </div>
                </form>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
