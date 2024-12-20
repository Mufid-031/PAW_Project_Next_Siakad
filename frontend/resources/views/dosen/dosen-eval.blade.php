<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="bg-gray-50 min-h-screen py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Back Button -->
                <a href="/dosen/sivitas" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-8 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Kembali</span>
                </a>

                <!-- Course Info Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-3xl font-bold text-gray-900">{{ $schedule['data']['course']['name'] }}</h1>
                                    <p class="mt-1 text-lg text-gray-600">{{ $schedule['data']['course']['code'] }}</p>
                                </div>
                                <div class="bg-blue-50 px-4 py-2 rounded-lg">
                                    <h3 class="text-sm font-medium text-blue-800">Dosen Pengampu</h3>
                                    <p class="mt-1 text-gray-900 font-medium">{{ $schedule['data']['teacher']['user']['name'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Evaluation History Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">Riwayat Evaluasi</h2>
                    </div>

                    <div class="px-6 py-5">
                        @if ($evaluations === null)
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada riwayat evaluasi</h3>
                                <p class="mt-1 text-sm text-gray-500">Evaluasi akan muncul setelah mahasiswa memberikan penilaian.</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">No</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">Nama</th>
                                            <th scope="col" class="hidden md:table-cell px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">Email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">Pesan</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($evaluations['data'] as $key => $evaluation)
                                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                            <span class="text-blue-800 font-medium text-sm">
                                                                {{ substr($evaluation['enrollment']['student']['user']['name'], 0, 1) }}
                                                            </span>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $evaluation['enrollment']['student']['user']['name'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $evaluation['enrollment']['student']['user']['email'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                        {{ $evaluation['komentar'] }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-md text-sm font-medium 
                                                        {{ $evaluation['nilai'] >= 80 ? 'bg-green-100 text-green-800' : 
                                                           ($evaluation['nilai'] >= 60 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                        {{ $evaluation['nilai'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </x-dosen-layout>
</x-layout>