{{-- {{ dd($courses) }} --}}

<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Mata Kuliah</h2>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/admin/users/create/course"
                            class="bg-ultramarine-400 hover:bg-ultramarine-900 text-white px-4 py-2 rounded-md transition duration-300 text-center">
                            Tambah Mata Kuliah
                        </a>
                        <select class="p-2 border rounded-lg">
                            <option>-- Filter --</option>
                            <option>Pemrograman Web</option>
                            <option>Basis Data</option>
                            <option>Algoritma</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-ultramarine-900 text-white">
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            No</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Nama Mata Kuliah</th>
                                        <th scope="col"
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Kode</th>
                                        <th scope="col"
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Program Studi</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            sks</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($courses['data'] as $key => $course)
                                        <tr class="hover:bg-gray-50">
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                {{ $key + 1 }}</td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                {{ $course['name'] }}</td>
                                            <td
                                                class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                {{ $course['code'] }}</td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                                {{ $course['programStudi'] }}</td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                    {{ $course['sks'] }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                                <div
                                                    class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                    <button
                                                        @click="$dispatch('update-course-modal', {course :@js($course)})"
                                                        class="font-medium flex items-center gap-1">
                                                        <x-far-edit class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Ubah</span>
                                                    </button>
                                                    <button id="delete" data-id="{{ $course['code'] }}"
                                                        class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                        <x-ionicon-trash-outline class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Hapus</span>
                                                    </button>
                                                    <button
                                                        class="text-ultramarine-500 hover:text-ultramarine-500 font-medium flex items-center gap-1"
                                                        onclick="openModal('{{ $course['id'] }}')">
                                                        <x-ionicon-document-text-outline class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Detail</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const deleteButtons = document.querySelectorAll('#delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', async () => {
                    const codeId = button.getAttribute('data-id');
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const confirmDelete = confirm('Apakah Anda yakin ingin menghapus course ini?');
                    if (confirmDelete) {
                        try {
                            await axios.delete(`http://localhost:3000/api/course/${codeId}`, {
                                headers: {
                                    'X-API-TOKEN': `${token}`
                                }
                            });
                            alert('Berhasil menghapus course');
                            window.location.reload();
                        } catch (error) {
                            alert('Gagal menghapus course');
                        }
                    }
                });
            });
        </script>
    </x-admin-sidebar>
</x-admin-layout>

{{-- Pop up Modal --}}
<x-course-modal :courses="$courses['data']" />
<x-course-update />
