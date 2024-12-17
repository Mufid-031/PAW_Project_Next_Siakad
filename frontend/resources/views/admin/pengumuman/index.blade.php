<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Data Pengumuman</h2>
                        <p class="text-gray-600 mt-1">Kelola semua data pengumuman yang tersedia</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <a href="/admin/service/pengumuman/create"
                            class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Pengumuman
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @if ($announcements == null)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="p-5">
                            <div class="text-center">
                                <h3 class="text-lg font-semibold text-gray-800">Tidak ada pengumuman</h3>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($announcements['data'] as $announcement)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="p-5">
                                <!-- Judul Pengumuman -->
                                <h3 class="text-2xl font-semibold text-gray-800 mb-3">{{ $announcement['judul'] }}</h3>

                                <!-- Konten Pengumuman (Formatted like Markdown) -->
                                <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl max-w-none">
                                    {!! nl2br(e($announcement['konten'])) !!}
                                </div>
                            </div>

                            <div class="flex items-center justify-between gap-2 p-4 bg-gray-100 border-t border-gray-200">
                                <div>
                                    <button
                                        class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                                        Edit
                                    </button>
                                    <button onclick="deleteConfirmation({{ $announcement['id'] }})"
                                        class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                                        Hapus
                                    </button>
                                </div>
                                <a href="/admin/service/pengumuman/{{ $announcement['id'] }}"
                                    class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                                    Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <script>
            async function deleteConfirmation(id) {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Pengumuman akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const token = await axios.post('/token/get-token').then(res => res.data);
                            const response = await axios.delete('http://localhost:3000/api/announcements/' + id, {
                                headers: {
                                    'X-API-TOKEN': token
                                }
                            }).then(res => res.data);
                            if (response.status === 201) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Pengumuman telah dihapus.',
                                    'success'
                                );
                                window.location.reload();
                            }
                        } catch (error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: error.response?.data.errors || error.message,
                            });
                        }
                    }
                });
            }
        </script>
    </x-admin-sidebar>
</x-admin-layout>
