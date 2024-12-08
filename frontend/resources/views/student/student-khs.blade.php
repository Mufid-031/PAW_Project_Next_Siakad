{{-- {{ dd($enrollments) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <!-- Riwayat Akademik per Semester (nilai per semester) -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Hasil Studi
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut riwayat akademik Anda setiap semester.
                    </p>
                </div>

                <!-- Semester Buttons -->
                <div class="flex flex-wrap justify-center mb-6">
                    @for ($i = 1; $i <= 8; $i++)
                        <button onclick="showSemester({{ $i }})" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                            Semester {{ $i }}
                        </button>
                    @endfor
                </div>

                <!-- Tables for each semester -->
                @for ($i = 1; $i <= 8; $i++)
                    <div id="semester-{{ $i }}" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester {{ $i }}</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments['data'] as $key => $enrollment)
                                        @if ($enrollment['schedule']['course']['semester'] == 'semester_' . $i)
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['grade'] }}</td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    {{-- Melihat IP --}}
                                    <tr class="bg-gray-100">
                                        <td colspan="4" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600 text-right">Nilai IP :</td>
                                        <td colspan="1" class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600">3.45</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
        </main>
    </x-layout>
</x-student-layout>

<script>
    function showSemester(semester) {
        // Sembunyikan semua tabel semester
        document.querySelectorAll('.semester-table').forEach(table => {
            table.classList.add('hidden');
        });

        // Tampilkan tabel semester yang dipilih
        document.getElementById('semester-' + semester).classList.remove('hidden');
    }

    // Tampilkan tabel semester 1 secara default
    document.addEventListener('DOMContentLoaded', () => {
        showSemester(1);
    });
</script>