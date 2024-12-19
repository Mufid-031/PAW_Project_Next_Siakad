<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <main class="container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-4">Tambah Pengumuman Baru</h1>
                
                <form id="pengumumanForm" class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700" for="judul">Judul Pengumuman</label>
                        <input 
                            type="text" 
                            name="judul" 
                            id="judul" 
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-150"
                            required
                            placeholder="Masukkan judul pengumuman"
                        >
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700" for="konten">Konten Pengumuman</label>
                        <textarea 
                            name="konten" 
                            id="konten" 
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-150"
                            rows="6" 
                            required
                            placeholder="Tuliskan isi pengumuman"
                        ></textarea>
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <button 
                            type="button" 
                            onclick="window.history.back()" 
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150"
                        >
                            Simpan Pengumuman
                        </button>
                    </div>
                </form>
            </div>
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
