
<x-dosen-layout>
    <x-layout>
        <main class="ml-20 mr-20">
        <x-form>
            <x-form.item>
                <x-form.label>Mata Kuliah</x-form.label>
                <x-select x-form:control>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    <option value="matkul1">Matkul 1</option>
                    <option value="matkul2">Matkul 2</option>
                    <option value="matkul3">Matkul 3</option>
                </x-select>
                <x-form.message />
            </x-form.item>

            <x-form.item>
                <x-form.label>Kelas</x-form.label>
                <x-select x-form:control>
                    <option value="" disabled selected>Pilih Kelas</option>
                    <option value="kelas1">Kelas 1</option>
                    <option value="kelas2">Kelas 2</option>
                    <option value="kelas3">Kelas 3</option>
                </x-select>
                <x-form.message />
            </x-form.item>

            <x-form.item>
                <x-form.label>NIM</x-form.label>
                <x-select x-form:control>
                    <option value="" disabled selected>Pilih NIM</option>
                    <option value="nim1">NIM 1</option>
                    <option value="nim2">NIM 2</option>
                    <option value="nim3">NIM 3</option>
                </x-select>
                <x-form.message />
            </x-form.item>

            <x-form.item>
                <x-form.label>Nilai</x-form.label>
                <x-select x-form:control>
                    <option value="" disabled selected>Masukkan Nilai</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </x-select>
                <x-form.message />
            </x-form.item>
            <x-button type="submit">Submit Nilai</x-button>
        </x-form>
        </main>
    </x-layout>
</x-dosen-layout>