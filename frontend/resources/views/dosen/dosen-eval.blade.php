{{-- {{ dd($evaluations) }} --}}

<x-layout>
    <x-dosen-layout :teacher="$teacher">
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-6xl mx-auto p-6">
                <a href="/student/sivitas" class="flex items-center text-gray-400 hover:text-gray-300 mb-6">
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">{{ $schedule['data']['teacher']['user']['name'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6 mt-5">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">Riwayat Evaluasi</h1>
                    </div>

                    @if ($evaluations['data'] === [] || $evaluations === null)
                        <p class="text-gray-800">Belum ada riwayat evaluasi</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-ultramarine-900 text-white">
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                        No</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                        Nama</th>
                                    <th scope="col"
                                        class="hidden sm:table-cell px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                        Email</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                        Pesan</th>
                                    <th scope="col"
                                        class="px-4 sm:px-6 py-4 text-left text-xs sm:text-sm font-semibold">
                                        Nisal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($evaluations['data'] as $key => $evaluation)
                                    <tr class="hover:bg-gray-50">
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            {{ $key + 1 }}</td>
                                        <td
                                            class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            {{ $evaluation['enrollment']['student']['user']['name'] }}</td>
                                        <td
                                            class="hidden sm:table-cell px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900">
                                            {{ $evaluation['enrollment']['student']['user']['email'] }}</td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 sm:px-3 py-0.5 rounded-full text-xs sm:text-sm font-medium bg-ultramarine-100 text-ultramarine-800">
                                                {{ $evaluation['komentar'] }}
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-xs sm:text-sm">
                                            {{ $evaluation['nilai'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </main>
    </x-dosen-layout>
</x-layout>
