{{-- {{ dd($enrollments) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="container mx-auto p-6">
                <h2 class="text-2xl font-bold mb-6">{{ $enrollments['data'][0]['student']['user']['name'] }}</h2>

                <!-- Form Filter Semester -->
                <div class="flex justify-between items-center text-sm font-medium text-gray-600 mb-4">
                    <span>{{ $enrollments['data'][0]['student']['nim'] }}</span>
                    <div class="flex items-center">
                        <label for="semester" class="mr-2">Semester:</label>
                        <select id="semester-filter" class="border border-gray-300 rounded px-2 py-1">
                            <option value="">Semua Semester</option>
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
            </div>

            <form id="validation-form">
                <table class="semester-table w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Kode</th>
                            <th class="border border-gray-300 px-4 py-2">Mata Kuliah</th>
                            <th class="border border-gray-300 px-4 py-2">SKS</th>
                            <th class="border border-gray-300 px-4 py-2">Dosen</th>
                            <th class="border border-gray-300 px-4 py-2">Jadwal</th>
                            <th class="border border-gray-300 px-4 py-2">Semester</th>
                            <th class="border border-gray-300 px-4 py-2">Pilih</th>
                        </tr>
                    </thead>
                    <tbody id="enrollments-table-body">
                        @foreach ($enrollments['data'] as $enrollment)
                            <tr class="enrollment-row"
                                data-semester="{{ $enrollment['schedule']['course']['semester'] }}">
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['course']['code'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['course']['name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['course']['sks'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['teacher']['user']['name'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['day'] . ', ' . $enrollment['schedule']['time'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $enrollment['schedule']['course']['semester'] }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <input type="checkbox" {{ $enrollment['isValidated'] ? 'checked' : '' }}
                                        name="enrollmentIds[]" value="{{ $enrollment['schedule']['id'] }}"
                                        class="form-checkbox h-5 w-5 text-blue-600"
                                        onchange="validateEnrollment(event)">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </main>
    </x-dosen-layout>
</x-layout>

<script>
    document.getElementById('semester-filter').addEventListener('change', function() {
        const selectedSemester = this.value;
        const rows = document.querySelectorAll('.enrollment-row');

        rows.forEach(row => {
            const rowSemester = row.getAttribute('data-semester');
            if (selectedSemester === '' || rowSemester === selectedSemester) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    async function validateEnrollment(e) {
        const scheduleId = e.target.value;
        const studentId = {{ $enrollments['data'][0]['student']['id'] }};
        console.log(scheduleId, studentId);
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            const res = await axios.post('http://localhost:3000/api/enrollment/validation', {
                scheduleId,
                studentId
            }, {
                headers: {
                    'X-API-TOKEN': `${token}`
                }
            }).then(res => {
                if (res.data.status === 201) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.data.message
                    }).then(() => {
                        window.location.reload();
                    })
                }
            })
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.response.data.errors
            })
        }
    }
</script>
