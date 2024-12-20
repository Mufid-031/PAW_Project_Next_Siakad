<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5" x-data>
            <div class="max-w-6xl mx-auto p-6">
                <a href="/dosen/sivitas" class="flex items-center text-gray-400 hover:text-gray-300 mb-6 no-print">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $schedule['data']['course']['name'] }}</h1>
                        <p class="text-gray-600">{{ $schedule['data']['course']['code'] }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">{{ $schedule['data']['teacher']['user']['name'] }}</p>
                        </div>
                    </div>
                    <div class="mb-4 mt-5 no-print">
                        <button id="print-button" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak PDF
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden print-container">
                    <div class="px-6 py-4 border-b grid grid-cols-2">
                        <h2 class="text-lg font-semibold text-gray-800">Penilaian Mahasiswa</h2>
                    </div>

                    <div class="overflow-x-auto mb-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NIM</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($schedule['data']['enrollments'] as $key => $student)
                                    <tr>
                                        <input type="hidden" name="enrollmentId" id="enrollmentId"
                                            value="{{ $student['id'] }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $student['student']['user']['name'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $student['student']['nim'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="print-only">{{ $student['grade'] ?? '-' }}</span>
                                            <div class="no-print flex items-center">
                                                @if ($student['grade'] === null)
                                                    <select name="nilai"
                                                        class="w-20 border border-gray-300 rounded-md p-1">
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                    <button type="button"
                                                        class="ml-2 px-2 py-1 flex text-xs font-semibold text-white bg-blue-500 rounded update-status">
                                                        <x-fas-edit class="w-4 h-4" /> Update
                                                    </button>
                                                @else
                                                    {{ $student['grade'] }}
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <style>
            @media print {
                /* Reset all visibility */
                body * {
                    visibility: hidden;
                }
                
                /* Show only printable content */
                .print-container,
                .print-container * {
                    visibility: visible;
                }

                /* Hide elements with no-print class */
                .no-print {
                    display: none !important;
                }

                /* Show elements with print-only class */
                .print-only {
                    display: block !important;
                }

                /* Position the printable content */
                .print-container {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                /* Table styling for print */
                table {
                    border-collapse: collapse;
                    width: 100%;
                    margin: 20px 0;
                }

                th, td {
                    border: 1px solid #000 !important;
                    padding: 12px !important;
                    text-align: left;
                }

                th {
                    background-color: #f3f4f6 !important;
                    -webkit-print-color-adjust: exact;
                }

                /* Add page break settings */
                .print-container {
                    page-break-inside: avoid;
                }

                /* Header styling for print */
                h1, h2 {
                    margin: 20px 0 !important;
                }

                /* Remove shadows and rounds for print */
                .shadow-sm {
                    box-shadow: none !important;
                }

                .rounded-lg {
                    border-radius: 0 !important;
                }
            }

            /* Non-print styles */
            .print-only {
                display: none;
            }
        </style>

        <script>
            const updateGradeButtons = document.querySelectorAll('.update-status');
            updateGradeButtons.forEach((button) => {
                button.addEventListener('click', async () => {
                    const id = button.parentElement.parentElement.firstElementChild.value;
                    const grade = button.parentElement.firstElementChild.value;
                    try {
                        const token = await axios.post('/token/get-token').then(res => res.data);
                        const response = await axios.post('http://localhost:3000/api/enrollment/grade', {
                            id,
                            grade
                        }, {
                            headers: {
                                'X-API-TOKEN': `${token}`
                            }
                        }).then(res => res.data);

                        if (response.status === 201) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then(() => {
                                window.location.reload();
                            })
                        }
                    } catch (error) {
                        console.log(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: error.response.data.errors,
                        })
                    }
                });
            });

            document.getElementById('print-button').addEventListener('click', () => {
                window.print();
            });
        </script>
    </x-dosen-layout>
</x-layout>