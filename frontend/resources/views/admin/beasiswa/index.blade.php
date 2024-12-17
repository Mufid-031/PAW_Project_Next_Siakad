{{-- {{ dd($scholarships) }} --}}
<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Data Beasiswa</h2>
                        <p class="text-gray-600 mt-1">Kelola semua data beasiswa yang tersedia</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <a href="/admin/service/beasiswa/create"
                            class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Beasiswa
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 justify-center gap-6 mb-8">
                @if ($scholarships == null)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="p-5">
                            <div class="flex justify-between items-center text-center">
                                <h3 class="text-lg font-semibold text-gray-800">Tidak ada beasiswa</h3>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($scholarships['data'] as $scholarship)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="p-5">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $scholarship['nama'] }}</h3>
                                    @php
                                        $isActive = \Carbon\Carbon::parse($scholarship['akhir'])
                                            ->setTimezone('Asia/Jakarta')
                                            ->isFuture();
                                    @endphp
                                    <span
                                        class="inline-block px-2 py-1 text-xs rounded-full {{ $isActive ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} mt-2">
                                        {{ $isActive ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mt-2 text-sm">{{ $scholarship['deskripsi'] }}</p>
                                <div class="mt-4 flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($scholarship['mulai'])->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($scholarship['akhir'])->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-between gap-2 p-4 bg-gray-100 border-t border-gray-200">
                                <div>
                                    <button
                                        class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                                        Edit
                                    </button>
                                    <button
                                        onclick="deleteConfirmation({{ $scholarship['id'] }})"
                                        class="px-2 py-1 bg-ultramarine-400 text-white rounded-md hover:bg-ultramarine-900 transition-colors">
                                        Hapus
                                    </button>
                                </div>
                                <a href="{{ $scholarship['link'] }}" target="_blank"
                                    class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition-colors">
                                    Kunjungi Website
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
                    text: "Beasiswa akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const token = await axios.post('/token/get-token').then(res => res.data);
                            const response = await axios.delete('http://localhost:3000/api/beasiswa/' + id, {
                                headers: {
                                    'X-API-TOKEN': `${token}`
                                }
                            }).then(res => res.data);
                            if (response.status === 201) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Beasiswa telah dihapus.',
                                    'success'
                                );
                                window.location.reload();
                            }
                        } catch (error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: error.response?.data.errors || error.message,
                            })
                        }
                    }
                })

            }
        </script>
    </x-admin-sidebar>
</x-admin-layout>
