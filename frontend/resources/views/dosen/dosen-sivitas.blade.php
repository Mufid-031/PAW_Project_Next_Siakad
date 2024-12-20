<x-dosen-layout :teacher="$teacher">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 shadow-lg  lg:px-8">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="border-b border-gray-200">
                        <div class="px-6 py-5">
                            <h1 class="text-3xl font-bold text-gray-900">Daftar Mata Kuliah</h1>
                            <p class="mt-2 text-gray-600">Kelola absensi, nilai, dan evaluasi untuk setiap mata kuliah yang Anda ampu</p>
                        </div>
                    </div>

                    <div class="p-6">
                        @if (empty($teacher['data']['teacher']['schedules']))
                            <div class="text-center py-12">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada mata kuliah</h3>
                                <p class="mt-1 text-sm text-gray-500">Belum ada mata kuliah yang diampu saat ini.</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($teacher['data']['teacher']['schedules'] as $key => $schedule)
                                    <div class="bg-white rounded-xl border border-gray-200 hover:border-blue-500 transition-all duration-200 overflow-hidden">
                                        <!-- Course Header -->
                                        <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50">
                                            <h2 class="text-xl font-semibold text-gray-900">{{$schedule['course']['name']}}</h2>
                                            <p class="mt-1 text-sm text-gray-600">{{$schedule['course']['code']}}</p>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="p-4 space-y-3">
                                            <a href="/dosen/absen/{{ $schedule['id'] }}" 
                                               class="flex items-center justify-between w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-200">
                                                <span>Absensi</span>
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                            
                                            <a href="/dosen/input-nilai/{{ $schedule['id'] }}"
                                               class="flex items-center justify-between w-full bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-200">
                                                <span>Input Nilai</span>
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            
                                            <a href="/dosen/eval-dosen/{{ $schedule['id'] }}"
                                               class="flex items-center justify-between w-full bg-purple-500 hover:bg-purple-600 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-200">
                                                <span>Hasil Evaluasi</span>
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>