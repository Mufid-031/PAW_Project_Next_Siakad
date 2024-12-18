<x-dosen-layout :teacher="$teacher">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Kartu Rencana Studi (KRS)</h2>

    <!-- Form Filter Semester -->
    <div class="flex justify-between items-center text-sm font-medium text-gray-600">
        <span>Tahun Ajaran: 2024/2025</span>
        <form id="filter-form" class="w-1/5">
            <select name="semester" id="semester-filter" class="mt-1 w-full p-3 rounded-lg bg-gray-50">
                <option value="semester_1"
                    {{ request('semester', 'semester_1') == 'semester_1' ? 'selected' : '' }}>Semester 1
                </option>
                <option value="semester_2" {{ request('semester') == 'semester_2' ? 'selected' : '' }}>
                    Semester 2</option>
                <option value="semester_3" {{ request('semester') == 'semester_3' ? 'selected' : '' }}>
                    Semester 3</option>
                <option value="semester_4" {{ request('semester') == 'semester_4' ? 'selected' : '' }}>
                    Semester 4</option>
                <option value="semester_5" {{ request('semester') == 'semester_5' ? 'selected' : '' }}>
                    Semester 5</option>
                <option value="semester_6" {{ request('semester') == 'semester_6' ? 'selected' : '' }}>
                    Semester 6</option>
                <option value="semester_7" {{ request('semester') == 'semester_7' ? 'selected' : '' }}>
                    Semester 7</option>
                <option value="semester_8" {{ request('semester') == 'semester_8' ? 'selected' : '' }}>
                    Semester 8</option>
            </select>
        </form>
    </div>
</div>

    <!-- Tabel KRS -->
    <form id="krs-form" method="POST" action="{{ route('krs.submit') }}">
        @csrf
        @php
            $selectedSemester = request('semester', '1');
        @endphp

        <table class="semester-table w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Kode</th>
                    <th class="border border-gray-300 px-4 py-2">Mata Kuliah</th>
                    <th class="border border-gray-300 px-4 py-2">SKS</th>
                    <th class="border border-gray-300 px-4 py-2">Dosen</th>
                    <th class="border border-gray-300 px-4 py-2">Jadwal</th>
                    <th class="border border-gray-300 px-4 py-2">Pilih</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    @if ($schedule['course']['semester'] == $selectedSemester)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $schedule['course']['code'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $schedule['course']['name'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $schedule['course']['sks'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $schedule['lecturer'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $schedule['time'] }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <input type="checkbox" name="scheduleIds[]" value="{{ $schedule['id'] }}" class="form-checkbox h-5 w-5 text-blue-600" onchange="updateTotalSks()">
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <p id="total-sks-display" class="font-bold">Total SKS: 0</p>
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Simpan KRS</button>
        </div>
    </form>
</div>

<script>
    function updateTotalSks() {
        const checkboxes = document.querySelectorAll('input[name="scheduleIds[]"]:checked');
        let totalSks = 0;

        checkboxes.forEach((checkbox) => {
            const row = checkbox.closest('tr');
            const sks = parseInt(row.querySelector('td:nth-child(3)').textContent) || 0;
            totalSks += sks;
        });

        document.getElementById('total-sks-display').textContent = `Total SKS: ${totalSks}`;
    }
</script>
@endsection

        </main>
    </x-layout>
</x-dosen-layout>