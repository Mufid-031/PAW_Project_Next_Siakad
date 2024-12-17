<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <main class="container mx-auto px-6 py-8">
            <h1 class="text-xl font-bold mb-4">Tambah Beasiswa Baru</h1>
            <form id="beasiswaForm">
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Beasiswa</label>
                    <input type="text" name="nama" id="name" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="sdeskripsi" class="w-full border border-gray-300 rounded p-2" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Mulai</label>
                    <input type="datetime-local" name="mulai" id="mulai" class="w-full border border-gray-300 rounded p-2"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tanggal Berakhir</label>
                    <input type="datetime-local" name="akhir" id="akhir" class="w-full border border-gray-300 rounded p-2"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Link Beasiswa</label>
                    <input type="url" name="link" id="link" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    Beasiswa</button>
            </form>
        </main>

        <script>
            const beasiswaForm = document.getElementById('beasiswaForm');
            beasiswaForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = e.target.name.value;
                const deskripsi = e.target.deskripsi.value;
                const mulai = e.target.mulai.value;
                const akhir = e.target.akhir.value;
                const link = e.target.link.value;
                const token = await axios.post('/token/get-token').then(res => res.data);
                try {
                    const response = await axios.post('http://localhost:3000/api/beasiswa/register', {
                        name,
                        deskripsi,
                        mulai,
                        akhir,
                        link
                    }, {
                        headers: {
                            'X-API-TOKEN': `${token}`
                        }
                    });
                    if (response.status === 201) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.data.message,
                        })
                        window.location.replace('/admin/service/beasiswa');
                    }
                } catch (error) {
                    console.error(error);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response?.data.errors || error.message,
                    })
                }
            });
        </script>
    </x-admin-sidebar>
</x-admin-layout>
