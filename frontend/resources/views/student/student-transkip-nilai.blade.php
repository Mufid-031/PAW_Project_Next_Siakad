{{-- {{ dd($enrollments) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            {{-- Transkip NIlai --}}
            <div id="transkip-table" class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Transkip Nilai
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Berikut adalah transkip nilai Anda.
                    </p>
                </div>
                <!-- Print Button -->
                <div class="mb-4">
                    <button id="print-button" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg">
                        Cetak PDF
                    </button>
                </div>
                <div class="overflow-x-auto mb-4" >
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    No</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Kode Kelas</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Mata Kuliah</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    SKS</th>
                                <th
                                    class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">
                                    Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($enrollments['status'] == 200)
                                @foreach ($enrollments['data'] as $key => $enrollment)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                            {{ $loop->iteration }}</td>
                                        <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                            {{ $enrollment['schedule']['course']['code'] }}</td>
                                        <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                            {{ $enrollment['schedule']['course']['name'] }}</td>
                                        <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                            {{ $enrollment['schedule']['course']['sks'] }}</td>
                                        <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600 grade">
                                            {{ $enrollment['grade'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            {{-- Melihat IPK --}}
                            <tr class="bg-gray-100">
                                <td colspan="4" id="total-sks"
                                    class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600 text-right">
                                    </td>
                                <td colspan="1" id="nilai-ipk"
                                    class="border border-gray-200 px-4 py-3 text-sm font-semibold text-gray-600">IPK: 3.45
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                #transkip-table, #transkip-table * {
                    visibility: visible;
                }
                #transkip-table {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
                #print-button {
                    display: none;
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
            const ipk = document.getElementById('nilai-ipk');
            const grades = document.querySelectorAll('.grade');
            const rows = document.querySelectorAll('tbody tr:not(.bg-gray-100)');

            let totalPoints = 0;
            let totalSKS = 0;
            let sksDiambil = 0;

            rows.forEach(row => {
                const grade = row.querySelector('.grade').textContent.trim();
                const sks = parseFloat(row.children[3].textContent);

                sksDiambil += sks;

                if (!isNaN(sks) && grade !== '-') {
                    let gradePoint = 0;

                    switch (grade) {
                        case 'A':
                            gradePoint = 4;
                            break;
                        case 'B':
                            gradePoint = 3;
                            break;
                        case 'C':
                            gradePoint = 2;
                            break;
                        case 'D':
                            gradePoint = 1;
                            break;
                        case 'E':
                            gradePoint = 0;
                            break;
                    }

                    totalPoints += (gradePoint * sks);
                    totalSKS += sks;
                }
            });

            document.getElementById('total-sks').textContent = 'jumlah SKS diambil : ' + sksDiambil;
            const ipkValue = totalSKS > 0 ? (totalPoints / totalSKS) : 0;
            ipk.textContent = 'IPK : ' + ipkValue.toFixed(2);
        </script>
    </x-layout>
</x-student-layout>
