<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="min-h-screen bg-gray-50 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-8">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li><a href="/admin/dashboard" class="text-gray-500 hover:text-gray-700">Dashboard</a></li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg>
                                <a href="/admin/schedule" class="ml-1 text-gray-500 hover:text-gray-700">Jadwal</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg>
                                <span class="ml-1 text-gray-700 font-medium">Buka Kelas</span>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="mt-4 text-3xl font-bold text-gray-900">Buka Kelas Baru</h1>
                    <p class="mt-2 text-sm text-gray-600">Isi formulir di bawah ini untuk membuka kelas baru</p>
                </div>

                <div class="shadow-sm rounded-lg border border-gray-200">
                    <form action="/admin/schedule/open-class" method="POST" class="p-6">
                        <div class="space-y-8">
                            <div class="mb-4 flex items-center justify-between">
                                <div>
                                    <label for="semesterFilter"
                                        class="block text-sm font-medium text-gray-700 mb-2">Filter
                                        Semester:</label>
                                    <select id="semesterFilter"
                                        class="w-48 p-2 rounded-lg border-gray-300 shadow-sm focus:border-ultramarine-500 focus:ring-ultramarine-500 transition-colors">
                                        <option value="all">Semua Semester</option>
                                        <option value="semester_1">Semester 1</option>
                                        <option value="semester_2">Semester 2</option>
                                        <option value="semester_3">Semester 3</option>
                                        <option value="semester_4">Semester 4</option>
                                        <option value="semester_5">Semester 5</option>
                                        <option value="semester_6">Semester 6</option>
                                        <option value="semester_7">Semester 7</option>
                                        <option value="semester_8">Semester 8</option>
                                    </select>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kode MK</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Mata Kuliah</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Semester</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($courses['data'] as $course)
                                            <tr class="hover:bg-gray-50 course-row"
                                                data-semester="{{ $course['semester'] }}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $course['code'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $course['name'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ ucfirst(str_replace('_', ' ', $course['semester'])) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <div class="space-y-2">
                                                        <select name="class"
                                                            class="p-2 rounded-lg border-gray-300 shadow-sm focus:border-ultramarine-500 focus:ring-ultramarine-500 transition-colors">
                                                            <option value="true"
                                                                {{ $course['isActive'] == true ? 'selected' : '' }}>
                                                                Aktif</option>
                                                            <option value="false"
                                                                {{ $course['isActive'] == false ? 'selected' : '' }}>
                                                                Nonaktif</option>
                                                        </select>
                                                        <button type="button"
                                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-ultramarine-400 rounded-lg hover:bg-ultramarine-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ultramarine-500 transition-all duration-200">
                                                            <svg class="w-4 h-4 mr-1.5" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                            </svg>
                                                            Ubah Status
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-admin-sidebar>

    <script>
        document.querySelectorAll('.course-row button').forEach(button => {
            button.addEventListener('click', async (e) => {
                const row = e.target.closest('.course-row');
                const courseCode = e.target.closest('.course-row').querySelector('td').innerText;
                const status = e.target.previousElementSibling.value;

                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const response = await axios.patch('http://localhost:3000/api/course', {
                        code: courseCode,
                        isActive: status === 'true' ? true : false
                    }, {
                        headers: {
                            'X-API-TOKEN': token
                        }
                    }).then(data => data.data);
                    if (response.status === 201) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Status mata kuliah berhasil diperbarui",
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "Terjadi kesalahan saat memperbarui status mata kuliah",
                    });
                }
            });

        });
        document.getElementById('semesterFilter').addEventListener('change', function() {
            const selectedSemester = this.value;
            const rows = document.querySelectorAll('.course-row');

            rows.forEach(row => {
                if (selectedSemester === 'all' || row.dataset.semester === selectedSemester) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-admin-layout>
