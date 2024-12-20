<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="mx-auto max-w-7xl px-4 py-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Enhanced Header Section -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                    <h1 class="text-2xl font-bold text-white text-center mb-3">
                        Validasi Kartu Rencana Studi (KRS)
                    </h1>
                    <p class="text-blue-100 text-center text-sm max-w-2xl mx-auto">
                        KRS adalah dokumen yang berisi daftar mata kuliah yang akan diambil oleh mahasiswa dalam satu
                        semester. Pastikan untuk memperhatikan prasyarat dan jumlah SKS maksimal yang diperbolehkan.
                    </p>
                </div>

                <!-- Student Info Card -->
                <div class="bg-white px-8 py-6 border-b">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center space-x-4">
                            <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">
                                    {{ $enrollments['data'][0]['student']['user']['name'] }}
                                </h2>
                                <p class="text-gray-600">
                                    NIM: {{ $enrollments['data'][0]['student']['nim'] }}
                                </p>
                            </div>
                        </div>
                        <button id="print-button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak KRS
                        </button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="bg-gray-50 px-8 py-4 border-b">
                    <div class="flex items-center space-x-4">
                        <label for="semester" class="text-sm font-medium text-gray-600">Filter Semester:</label>
                        <select id="semester-filter" class="border border-gray-300 rounded-lg px-4 py-2 bg-white text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            <option value="">Semua Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="semester_{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="px-8 py-6">
                    <form id="validation-form">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Mata Kuliah</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">SKS</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Dosen</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jadwal</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Semester</th>
                                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Validasi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($enrollments['data'] as $enrollment)
                                        <tr class="enrollment-row hover:bg-gray-50 transition-colors"
                                            data-semester="{{ $enrollment['schedule']['course']['semester'] }}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $enrollment['schedule']['course']['code'] }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $enrollment['schedule']['course']['name'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                                                    {{ $enrollment['schedule']['course']['sks'] }} SKS
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $enrollment['schedule']['teacher']['user']['name'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="inline-flex items-center">
                                                    <svg class="h-4 w-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $enrollment['schedule']['day'] . ', ' . $enrollment['schedule']['time'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full">
                                                    {{ $enrollment['schedule']['course']['semester'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" 
                                                        {{ $enrollment['isValidated'] ? 'checked' : '' }}
                                                        name="enrollmentIds[]" 
                                                        value="{{ $enrollment['schedule']['id'] }}"
                                                        class="sr-only peer"
                                                        onchange="validateEnrollment(event)">
                                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <style>
            @media print {
                body * {
                    visibility: hidden;
                }
                
                main, main * {
                    visibility: visible;
                }
                
                main {
                    position: absolute;
                    left: 0;
                    top: 0;
                }

                .no-print, 
                button,
                select,
                .peer,
                .peer-checked\:after\:translate-x-full {
                    display: none !important;
                }

                .bg-gradient-to-r {
                    background: #2563eb !important;
                    -webkit-print-color-adjust: exact;
                }

                .shadow-lg {
                    box-shadow: none !important;
                }

                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    border: 1px solid #e5e7eb;
                    padding: 12px;
                    text-align: left;
                }

                .bg-blue-100,
                .bg-gray-100 {
                    background-color: #f3f4f6 !important;
                    -webkit-print-color-adjust: exact;
                }
            }

            /* Custom scrollbar */
            .overflow-x-auto::-webkit-scrollbar {
                height: 8px;
            }

            .overflow-x-auto::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 4px;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 4px;
            }

            .overflow-x-auto::-webkit-scrollbar-thumb:hover {
                background: #666;
            }
        </style>

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

            document.getElementById('print-button').addEventListener('click', () => {
                window.print();
            });

            async function validateEnrollment(e) {
                const scheduleId = e.target.value;
                const studentId = {{ $enrollments['data'][0]['student']['id'] }};
                
                try {
                    const token = await axios.post('/token/get-token').then(res => res.data);
                    const res = await axios.post('http://localhost:3000/api/enrollment/validation', {
                        scheduleId,
                        studentId
                    }, {
                        headers: {
                            'X-API-TOKEN': `${token}`
                        }
                    });

                    if (res.data.status === 201) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.data.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.response.data.errors,
                        confirmButtonColor: '#3b82f6'
                    });
                }
            }
        </script>
    </x-dosen-layout>
</x-layout>