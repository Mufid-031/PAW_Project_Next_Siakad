<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <x-admin-card :students="$students" :teachers="$teachers" />

            <!-- Activity Table -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Aktifitas Terbaru</h2>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aktifitas
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pengguna
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $mergedData = array_merge($students['data'], $teachers['data']);
                                usort($mergedData, function ($a, $b) {
                                    return strtotime($b['createdAt']) - strtotime($a['createdAt']);
                                });
                            @endphp
                            @foreach ($mergedData as $data)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <p class="text-gray-900">
                                            {{ \Carbon\Carbon::parse($data['createdAt'])->setTimezone('Asia/Jakarta')->format('d F Y') }}
                                        </p>
                                        <p class="text-gray-500">
                                            {{ \Carbon\Carbon::parse($data['createdAt'])->setTimezone('Asia/Jakarta')->format('H:i') }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 inline-flex leading-5 font-semibold">
                                            Membuat Akun {{ $data['role'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">{{ $data['name'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        {{ $data['email'] }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
