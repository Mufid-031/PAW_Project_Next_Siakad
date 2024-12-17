<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <main class="container mx-auto px-6 py-8">
            <h1 class="text-xl font-bold mb-4">Tambah Beasiswa Baru</h1>
            <form id="pengumumanForm">
                <div class="mb-4">
                    <label class="block text-gray-700">Judul</label>
                    <input type="text" name="judul" id="judul" class="w-full border border-gray-300 rounded p-2"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Konten</label>
                    <textarea name="konten" id="konten" class="w-full border border-gray-300 rounded p-2" rows="4" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    Pengumuman</button>
            </form>
        </main>

        <script>
            const pengumumanForm = document.getElementById('pengumumanForm');
            pengumumanForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const judul = e.target.judul.value;
                const konten = e.target.konten.value;
                const token = await axios.post('/token/get-token').then(res => res.data);
                try {
                    const response = await axios.post('http://localhost:3000/api/announcements/create', {
                        judul,
                        konten,
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
                        window.location.replace('/admin/service/pengumuman');
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
