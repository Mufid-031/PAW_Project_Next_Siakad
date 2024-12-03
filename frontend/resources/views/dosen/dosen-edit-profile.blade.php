
<x-dosen-layout>
    <x-layout>
        <x-form>
            <!-- Input Nama Dosen -->
            <x-form.input
                name="name"
                label="Nama Lengkap"
                placeholder="Nama Lengkap"
                value="Dr. Agus Santoso, M.T."
                description-trailing="Masukkan nama lengkap sesuai identitas Anda."
            />
        
            <!-- Input NIP -->
            <x-form.input
                name="nip"
                label="NIP"
                placeholder="123456789"
                value="1987654321"
                description-trailing="NIP Anda akan digunakan sebagai identifikasi utama di sistem."
            />
        
            <!-- Select Email -->
            <x-form.item>
                <x-form.label>Email</x-form.label>
                <x-select name="email" x-form:control>
                    <option value="" disabled>Pilih email yang terverifikasi</option>
                    <option value="agus.santoso@univ.ac.id" selected>agus.santoso@univ.ac.id</option>
                    <option value="agus.santoso@gmail.com">agus.santoso@gmail.com</option>
                    <option value="agus.santoso@support.com">agus.santoso@support.com</option>
                </x-select>
                <x-form.description>
                    Anda dapat mengatur email terverifikasi di
                    <x-link href="/settings/emails">pengaturan email</x-link>.
                </x-form.description>
                <x-form.message />
            </x-form.item>
        
            <!-- Input Bio -->
            <x-form.item>
                <x-form.label>Bio</x-form.label>
                <x-textarea
                    name="bio"
                    x-form:control
                    placeholder="Ceritakan sedikit tentang diri Anda"
                    class="resize-none"
                >Dosen Teknik Informatika yang berpengalaman dalam bidang Kecerdasan Buatan dan Pembelajaran Mesin. Aktif sebagai pembimbing penelitian mahasiswa sarjana dan pascasarjana.</x-textarea>
                <x-form.description>
                    Anda dapat menggunakan <span>@mention</span> untuk menyebut pengguna atau organisasi lain.
                </x-form.description>
                <x-form.message />
            </x-form.item>
        
            <!-- Submit Button -->
            <x-button type="submit">Perbarui Profil</x-button>
        </x-form>
        
    </x-layout>
</x-dosen-layout>