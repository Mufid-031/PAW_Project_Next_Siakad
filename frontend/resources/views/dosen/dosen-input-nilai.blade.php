<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                    Input Nilai Mata Kuliah: {{ isset($schedule['course']) ? $schedule['course']['name'] : 'Nama Mata Kuliah Tidak Ditemukan' }} 
                    ({{ isset($schedule['course']) ? $schedule['course']['code'] : 'Kode Tidak Ditemukan' }})
                </h1>
                <p class="text-center mb-6">
                    Kelas: {{ $schedule['class'] ?? 'Kelas Tidak Ditemukan' }} | 
                    Semester: {{ $schedule['semester'] ?? 'Semester Tidak Ditemukan' }}
                </p>
                

                <!-- Form Input Nilai -->
                <form id="gradeForm">
                    @csrf
                    <div class="space-y-4">
                        @foreach ($enrollments as $enrollment)
                            <div class="flex justify-between items-center">
                                <div class="flex-1">
                                    <label class="block text-sm font-semibold text-gray-600">
                                        {{ $enrollment['student']['name'] }}
                                    </label>
                                    <input type="hidden" name="enrollment_ids[]" value="{{ $enrollment['id'] }}">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-semibold text-gray-600">Nilai Angka</label>
                                    <input type="number" 
                                           name="grades[{{ $enrollment['id'] }}][numeric]" 
                                           value="{{ old('grades.' . $enrollment['id'] . '.numeric', $enrollment['numeric_grade'] ?? '') }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                    @error('grades.' . $enrollment['id'] . '.numeric')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex-1">
                                    <label class="block text-sm font-semibold text-gray-600">Nilai Huruf</label>
                                    <select name="grades[{{ $enrollment['id'] }}][letter]" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md">
                                        <option value="A" {{ old('grades.' . $enrollment['id'] . '.letter', $enrollment['letter_grade'] ?? '') === 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ old('grades.' . $enrollment['id'] . '.letter', $enrollment['letter_grade'] ?? '') === 'B' ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ old('grades.' . $enrollment['id'] . '.letter', $enrollment['letter_grade'] ?? '') === 'C' ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ old('grades.' . $enrollment['id'] . '.letter', $enrollment['letter_grade'] ?? '') === 'D' ? 'selected' : '' }}>D</option>
                                        <option value="E" {{ old('grades.' . $enrollment['id'] . '.letter', $enrollment['letter_grade'] ?? '') === 'E' ? 'selected' : '' }}>E</option>
                                    </select>
                                    @error('grades.' . $enrollment['id'] . '.letter')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                        <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded">Batal</button>
                    </div>
                </form>
            </div>
        </main>

        <script>
            const form = document.querySelector('#gradeForm');
            form.addEventListener('submit', async (e) => {
            e.preventDefault();

        const formData = new FormData(form);
        const grades = {};

        formData.forEach((value, key) => {
            const match = key.match(/grades\[(\d+)\]\[(\w+)\]/);
            if (match) {
                const [_, enrollmentId, gradeType] = match;
                grades[enrollmentId] = grades[enrollmentId] || {};
                grades[enrollmentId][gradeType] = value;
            }
        });

        try {
            // Ambil token dari sesi secara langsung di backend (misalnya, lewat route)
            const responseToken = await axios.get('/api/get-token'); // atau sesuaikan dengan API Anda

            const token = responseToken.data.token;

            const response = await axios.post('http://localhost:3000/api/enrollments/grades', {
                grades
            }, {
                headers: {
                    'X-API-TOKEN': token
                }
            });

            if (response.data.status === 200) {
                alert(response.data.message || 'Success Update Grades');
                window.location.reload();
            }
        } catch (error) {
            console.error(error);
            alert('Failed to update grades. Please try again.');
        }
    });

        </script>
    </x-dosen-layout>
</x-layout>
