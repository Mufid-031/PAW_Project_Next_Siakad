{{-- {{ dd($enrollments) }} --}}
{{-- {{ dd($student) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg">
                <!-- Header Section -->
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Kartu Rencana Studi (KRS)
                    </h1>
                    
                    <p class="text-gray-600 mb-4 text-center">
                        KRS adalah dokumen yang berisi daftar mata kuliah yang akan diambil oleh mahasiswa dalam satu semester. 
                        Pastikan untuk memperhatikan prasyarat dan jumlah SKS maksimal yang diperbolehkan.
                    </p>
                    
                    <div class="flex justify-between items-center text-sm font-medium text-gray-600">
                        <span>Tahun Ajaran: 2024/2025</span>
                    </div>
                </div>
        
                <!-- Main Content -->
                <div class="p-6">
                    <!-- Add Button -->
                    <button onclick="location.href='/student/krs/add'" class=" bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Mata Kuliah
                    </button>
                    <form id="krs">
                        <button type="submit" id="delete-selected" class="mb-5 bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg mt-4">Hapus MataKuliah</button>
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments['data'] as $key => $enrollment)
                                        <tr class="hover:bg-gray-50">
                                            <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                            <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['code'] }}</td>
                                            <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['name'] }}</td>
                                            <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['semester'] }}</td>
                                            <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['sks'] }}</td>
                                            <td class="border border-gray-200 px-4 py-3 text-center">
                                                <input type="checkbox" name="scheduleId" value="{{ $enrollment['schedule']['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-gray-50">
                                        <td colspan="4" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600 text-right">
                                            Total SKS:
                                        </td>
                                        <td colspan="2" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600">
                                            1
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </x-layout>
</x-student-layout>

<script>
    const form = document.querySelector('#krs');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const scheduleId = [];
        document.querySelectorAll('input[name="scheduleId"]:checked').forEach((checkbox) => {
            scheduleId.push(parseInt(checkbox.value));
        });
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            console.log(token);
            console.log(scheduleId);
            const response = await axios.delete('http://localhost:3000/api/enrollment', {
                scheduleId
            }, {
                headers: {
                    'X-API-TOKEN': `${token}`
                }
            }).then(data => data.data);
            if (response.status === 201) {
                alert('Success Delete Course');
                window.location.replace('http://127.0.0.1:8000/student/krs')
            }
        } catch (error) {
            console.log(error);
        }
    });
</script>
