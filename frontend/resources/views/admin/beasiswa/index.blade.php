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

            <div class="grid grid-cols-3 justify-center gap-6 mb-8">
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
                                    <button onclick="openEditModal({{ json_encode($scholarship) }})"
                                        class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                                        Edit
                                    </button>
                                    <button onclick="deleteConfirmation({{ $scholarship['id'] }})"
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

        {{-- Modal --}}
        <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Beasiswa</h3>
                    <form id="editScholarshipForm" onsubmit="updateScholarship(event)">
                        <input type="hidden" id="scholarshipId">
                        <div class="flex flex-col">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-800">Nama Beasiswa</label>
                                <input type="text" id="nama"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-200 p-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm" />
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-800">Deskripsi</label>
                                <textarea id="deskripsi"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-200 p-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm"></textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-800">Tanggal Mulai</label>
                                <input type="date" id="mulai"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-200 p-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm" />
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-800">Tanggal Akhir</label>
                                <input type="date" id="akhir"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-200 p-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm" />
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-800">Link Beasiswa</label>
                                <input type="url" id="link"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-200 p-3 focus:border-blue-500 focus:ring-blue-500 shadow-sm" />
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-6 mt-6 border-t border-gray-200">
                            <button type="button" onclick="closeEditModal()"
                                class="px-6 py-2.5 bg-red-500 text-white rounded-md hover:bg-red-900 transition-colors">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-400 text-white rounded-md hover:bg-blue-900 transition-colors">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
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
                            const response = await axios.delete(`http://localhost:3000/api/beasiswa/${id}`, {
                                headers: {
                                    'X-API-TOKEN': token
                                }
                            });

                            Swal.fire('Dihapus!', 'Beasiswa telah dihapus.', 'success');
                            window.location.reload();
                        } catch (error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: error.response?.data?.errors || error.message,
                            });
                        }
                    }
                });
            }

            function openEditModal(scholarship) {
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('scholarshipId').value = scholarship.id;
                document.getElementById('nama').value = scholarship.nama;
                document.getElementById('deskripsi').value = scholarship.deskripsi;
                document.getElementById('mulai').value = scholarship.mulai;
                document.getElementById('akhir').value = scholarship.akhir;
                document.getElementById('link').value = scholarship.link;
            }

            function closeEditModal() {
                document.getElementById('editModal').classList.add('hidden');
            }

            async function updateScholarship(event) {
                event.preventDefault();
                const id = document.getElementById('scholarshipId').value;
                const nama = document.getElementById('nama').value;
                const deskripsi = document.getElementById('deskripsi').value;
                const mulai = document.getElementById('mulai').value;
                const akhir = document.getElementById('akhir').value;
                const link = document.getElementById('link').value;

                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.patch(`http://localhost:3000/api/beasiswa`, {
                        id,
                        nama,
                        deskripsi,
                        mulai,
                        akhir,
                        link
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    });

                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Beasiswa berhasil diperbarui.",
                    });
                    window.location.reload();
                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.response?.data?.errors || error.message,
                    });
                }
            }
        </script>
    </x-admin-sidebar>
</x-admin-layout>
