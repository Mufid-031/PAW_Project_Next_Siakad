<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div x-data="courseManagement()" class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4 md:mb-0">Manajemen Mata Kuliah</h2>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/admin/users/create/course"
                            class="bg-ultramarine-400 hover:bg-ultramarine-900 text-white px-4 py-2 rounded-md transition duration-300 text-center">
                            Tambah Mata Kuliah
                        </a>
                        <select class="p-2 border rounded-lg" x-model="filterSemester">
                            <option value="">-- Semua Semester --</option>
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
                                            SKS</th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <template x-for="(course, index) in paginatedCourses" :key="course.id">
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900"
                                                x-text="index + 1 + (currentPage - 1) * itemsPerPage">
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900"
                                                x-text="course.name">
                                            </td>
                                            <td class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900"
                                                x-text="course.code">
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900"
                                                x-text="course.programStudi">
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800"
                                                    x-text="course.sks">
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                                <div
                                                    class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                                                    <button @click="$dispatch('update-course-modal', {course : course})"
                                                        class="font-medium flex items-center gap-1">
                                                        <x-far-edit class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Ubah</span>
                                                    </button>
                                                    <button :data-id="course.code" @click="deleteCourse(course.code)"
                                                        class="text-red-500 hover:text-red-700 font-medium flex items-center gap-1">
                                                        <x-ionicon-trash-outline class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Hapus</span>
                                                    </button>
                                                    <button
                                                        class="text-ultramarine-500 hover:text-ultramarine-500 font-medium flex items-center gap-1"
                                                        @click="openModal(course.id)">
                                                        <x-ionicon-document-text-outline class="w-4 h-4" />
                                                        <span class="hidden sm:inline">Detail</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination Controls -->
                <div class="px-6 py-4">
                    <div class="flex justify-center space-x-2">
                        <template x-for="page in totalPages" :key="page">
                            <button @click="currentPage = page"
                                :class="{
                                    'bg-ultramarine-700': currentPage === page,
                                    'bg-ultramarine-500': currentPage !==
                                        page
                                }"
                                class="px-4 py-2 rounded text-white" x-text="page"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function courseManagement() {
                return {
                    courses: @json($courses['data']),
                    currentPage: 1,
                    itemsPerPage: 10,
                    filterSemester: "",
                    semesters: ['semester_1', 'semester_2', 'semester_3', 'semester_4'],

                    get paginatedCourses() {
                        let filteredCourses = this.courses;

                        // Filter by semester if applicable
                        if (this.filterSemester) {
                            filteredCourses = filteredCourses.filter(
                                course => course.semester === this.filterSemester
                            );
                        }

                        // Pagination logic
                        const start = (this.currentPage - 1) * this.itemsPerPage;
                        const end = start + this.itemsPerPage;
                        return filteredCourses.slice(start, end);
                    },

                    get totalPages() {
                        const filteredCourses = this.filterSemester ?
                            this.courses.filter(course => course.semester === this.filterSemester) :
                            this.courses;

                        return Math.ceil(filteredCourses.length / this.itemsPerPage);
                    },


                    async deleteCourse(courseCode) {
                        const token = await axios.post('/token/get-token').then(res => res.data);
                        const confirmDelete = confirm('Apakah Anda yakin ingin menghapus course ini?');
                        if (confirmDelete) {
                            try {
                                await axios.delete(`http://localhost:3000/api/course/${courseCode}`, {
                                    headers: {
                                        'X-API-TOKEN': `${token}`
                                    }
                                });
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Course berhasil dihapus",
                                }).then(() => {
                                    window.location.reload();
                                });
                            } catch (error) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: error.response?.data.errors || error.message,
                                })
                            }
                        }
                    }
                }
            }
        </script>
    </x-admin-sidebar>
</x-admin-layout>

{{-- Pop up Modal --}}
<x-course-modal :courses="$courses['data']" />
<x-course-update />
