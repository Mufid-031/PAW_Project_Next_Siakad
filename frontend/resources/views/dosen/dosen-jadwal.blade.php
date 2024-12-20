<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-7">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <!-- Header Section -->
                    <div class="border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <div class="px-6 py-8 text-center">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Jadwal Mengajar</h1>
                            <p class="text-gray-600">Daftar jadwal mata kuliah yang diampu semester ini</p>
                        </div>
                    </div>

                    <div class="p-6">
                        <!-- Action Buttons -->
                        <div class="mb-6 flex justify-between items-center">
                            <div class="print-button">
                                <button id="print-button" class="inline-flex items-center px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                    </svg>
                                    Cetak PDF
                                </button>
                            </div>
                        </div>

                        <!-- Schedule Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kode Kelas</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jadwal</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($teacher['data']['teacher']['schedules'] as $key => $schedule)
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2.5 py-1.5 text-sm font-medium bg-blue-100 text-blue-800 rounded-lg">
                                                    {{ $schedule['course']['code'] }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $schedule['course']['name'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span class="text-sm text-gray-600">
                                                        {{ \Carbon\Carbon::parse($schedule['day'])->locale('id')->dayName }}, {{ $schedule['time'] }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                    <span class="text-sm text-gray-600">{{ $schedule['room'] }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-12 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada jadwal</h3>
                                                <p class="mt-1 text-sm text-gray-500">Belum ada jadwal mengajar yang tersedia.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-dosen-layout>
</x-layout>

<style>
     @media screen {
        .print-hide {
            display: block;
        }
    }
    
    @media print {
        /* Hide elements we don't want to print */
        .print-hide {
            display: none !important;
        }
        
        /* Reset backgrounds and colors for printing */
        body {
            margin: 0;
            padding: 0;
            background: white;
        }
        
        /* Ensure our content is visible */
        .printable-content {
            display: block !important;
            visibility: visible !important;
            background: white !important;
            color: black !important;
            padding: 20px !important;
        }
        
        /* Table styles for printing */
        table {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        
        th, td {
            border: 1px solid black !important;
            padding: 8px !important;
            text-align: left !important;
            color: black !important;
        }
        
        /* Header styles for printing */
        h1 {
            font-size: 24px !important;
            color: black !important;
            margin-bottom: 10px !important;
        }
        
        p {
            color: black !important;
        }
        
        /* Hide unnecessary decorative elements */
        svg {
            display: none !important;
        }
        
        /* Remove background gradients and shadows */
        .bg-gradient-to-r, .shadow-sm {
            background: none !important;
            box-shadow: none !important;
        }
    }
</style>

<script>
    document.getElementById('print-button').addEventListener('click', () => {
        window.print();
    });
</script>