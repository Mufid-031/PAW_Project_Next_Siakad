<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div
                class="bg-white rounded-xl shadow-sm p-6 sm:p-8 mb-8 transform transition-all duration-200 hover:shadow-md">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Data Pengumuman</h2>
                        <p class="mt-2 text-lg text-gray-600">Kelola semua data pengumuman yang tersedia</p>
                    </div>
                    <div>
                        <a href="/admin/service/pengumuman/create"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Pengumuman
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($announcements == null)
                    <div class="col-span-full">
                        <div
                            class="bg-white rounded-xl shadow-sm p-12 text-center transform transition-all duration-200 hover:shadow-md">
                            <div
                                class="rounded-full bg-blue-50 w-20 h-20 flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak ada pengumuman</h3>
                            <p class="text-gray-600">Belum ada pengumuman yang ditambahkan</p>
                        </div>
                    </div>
                @else
                    @foreach ($announcements['data'] as $announcement)
                        <div
                            class="bg-white rounded-xl shadow-sm overflow-hidden transform transition-all duration-200 hover:shadow-lg hover:-translate-y-1">
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ date('d M Y', strtotime($announcement['createdAt'])) }}
                                </div>

                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 transition-colors">
                                    {{ $announcement['judul'] }}</h3>

                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ $announcement['konten'] }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 border-t border-gray-100">
                                <div class="space-x-2">
                                    <button
                                        onclick="openEditModal({{ $announcement['id'] }}, '{{ $announcement['judul'] }}', '{{ $announcement['konten'] }}')"
                                        class="inline-flex items-center px-3 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button onclick="deleteConfirmation({{ $announcement['id'] }})"
                                        class="inline-flex items-center px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                                <button
                                    onclick="event.preventDefault(); openDetailModal({{ $announcement['id'] }}, '{{ $announcement['judul'] }}', '{{ $announcement['konten'] }}', '{{ $announcement['createdAt'] }}')"
                                    class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </button>
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
                            const response = await axios.delete('http://localhost:3000/api/announcements/' +
                                id, {
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
<x-pengumuman-edit />
<x-pengumuman-detail />
