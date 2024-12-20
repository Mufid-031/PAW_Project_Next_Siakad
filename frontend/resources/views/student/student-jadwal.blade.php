{{-- {{ dd($enrollments) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Jadwal Mata Kuliah
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah jadwal mata kuliah yang telah Anda pilih.
                    </p>
                </div>

                <!-- Dropdown for Semester Selection -->
                <div class="mb-4">
                    <label for="semester-select" class="block text-sm font-medium text-gray-700">Pilih Semester:</label>
                    <select id="semester-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}">Semester {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <!-- Print Button -->
                <div class="mb-4">
                    <button id="print-button" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg">
                        Cetak PDF
                    </button>
                </div>
                <!-- Tables for each semester -->
                @for ($i = 1; $i <= 8; $i++)
                    <div id="semester-{{ $i }}" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Semester {{ $i }}</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Dosen</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $isValidated = false;
                                    @endphp
                                    @foreach ($enrollments['data'] as $key => $enrollment)
                                        @if ($enrollment['schedule']['course']['semester'] == 'semester_' . $i)
                                            @if ($enrollment['isValidated'] == true)
                                                @php
                                                    $isValidated = true;
                                                @endphp
                                                <tr class="hover:bg-gray-50">
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['code'] }}</td>
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['course']['name'] }}</td>
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['teacher']['user']['name'] }}</td>
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['day'] }}, {{ $enrollment['schedule']['time'] }}</td>
                                                    <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $enrollment['schedule']['room'] }}</td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if (!$isValidated)
                                        <tr class="hover:bg-gray-50">
                                            <td colspan="6" class="text-center border border-gray-200 px-4 py-3 text-sm text-gray-600">Anda Belum Melakukan Validasi KRS, Silahkan Lakukan validasi dengan dosen Anda</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
        </main>
    </x-layout>
</x-student-layout>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .semester-table, .semester-table * {
            visibility: visible;
        }
        .semester-table {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000 !important;
            padding: 8px !important;
        }
    }
</style>
<script>
    document.getElementById('print-button').addEventListener('click', () => {
        window.print();
    });
</script>

<script>
    document.getElementById('semester-select').addEventListener('change', function() {
        const semester = this.value;
        // Sembunyikan semua tabel semester
        document.querySelectorAll('.semester-table').forEach(table => {
            table.classList.add('hidden');
        });

        // Tampilkan tabel semester yang dipilih
        document.getElementById('semester-' + semester).classList.remove('hidden');
    });

    // Tampilkan tabel semester 1 secara default
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('semester-select').value = 1;
        document.getElementById('semester-1').classList.remove('hidden');
    });
</script>