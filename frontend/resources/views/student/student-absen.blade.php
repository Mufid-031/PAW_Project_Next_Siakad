{{-- {{ dd($absences) }} --}}
<x-layout>
    <x-student-layout :student="$student">
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-6xl mx-auto p-6">
                <a href="/student/sivitas" class="flex items-center text-gray-600 hover:text-gray-900 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">
                            {{ $schedule['data']['schedule']['course']['name'] }}</h1>
                        <p class="text-gray-600">{{ $schedule['data']['schedule']['course']['code'] }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">{{ $schedule['data']['schedule']['teacher']['user']['name'] }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">
                                {{ $schedule['data']['schedule']['course']['semester'] }}</h3>
                            <p class="text-gray-800">Gasal 2024/2025</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-800">Riwayat Kehadiran</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pertemuan
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Materi
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status Kehadiran
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($absences === null)
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Belum ada absensi</td>
                                    </tr>
                                @else
                                    @foreach ($absences['data'] as $absence)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $absence['pertemuan'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($absence['createAt'])->setTimezone('Asia/Jakarta')->format('d F Y, H:i') }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $absence['materi'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap flex items-center">
                                                <select name="statusKehadiran"
                                                class="status-select px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                                    <option value="ALPA"
                                                        {{ $absence['statusKehadiran'] == 'ALPHA' ? 'selected' : '' }}>
                                                        Alpha</option>
                                                    <option value="IZIN"
                                                        {{ $absence['statusKehadiran'] == 'IZIN' ? 'selected' : '' }}>
                                                        Izin</option>
                                                    <option value="SAKIT"
                                                        {{ $absence['statusKehadiran'] == 'SAKIT' ? 'selected' : '' }}>
                                                        Sakit</option>
                                                    <option value="HADIR"
                                                        {{ $absence['statusKehadiran'] == 'HADIR' ? 'selected' : '' }}>
                                                        Hadir</option>
                                                </select>
                                                <button type="button"
                                                    class="ml-2 px-2 py-1 flex text-xs font-semibold text-white bg-blue-500 rounded update-status"
                                                    data-student-id="{{ $absence['studentId'] }}"
                                                    data-schedule-id="{{ $absence['scheduleId'] }}"
                                                    data-pertemuan="{{ $absence['pertemuan'] }}"
                                                    data-materi="{{ $absence['materi'] }}">
                                                    <x-fas-edit class="w-4 h-4" /> Update
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>

<style>
    .status-select {
        background-color: #fd7777; /* (Alpha) */
    }
    .status-select.izin {
        background-color: #fde69a; /* Yellow for Izin */
    }
    .status-select.sakit {
        background-color: #92efff; /* Blue for Sakit */
    }
    .status-select.hadir {
        background-color: #90ffaa; /* Green for Hadir */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selects = document.querySelectorAll('.status-select');

        selects.forEach(select => {
            updateSelectColor(select);

            select.addEventListener('change', function() {
                updateSelectColor(select);
            });
        });

        function updateSelectColor(select) {
            select.classList.remove('alpha', 'izin', 'sakit', 'hadir');
            switch (select.value) {
                case 'ALPHA':
                    select.classList.add('alpha');
                    break;
                case 'IZIN':
                    select.classList.add('izin');
                    break;
                case 'SAKIT':
                    select.classList.add('sakit');
                    break;
                case 'HADIR':
                    select.classList.add('hadir');
                    break;
            }
        }
    });
</script>

<script>
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', async (e) => {
            const studentId = e.target.getAttribute('data-student-id');
            const scheduleId = e.target.getAttribute('data-schedule-id');
            const pertemuan = e.target.getAttribute('data-pertemuan');
            const materi = e.target.getAttribute('data-materi');
            const statusKehadiran = e.target.previousElementSibling.value;

            try {
                const token = await axios.post('/token/get-token').then(res => res.data);
                const response = await axios.patch('http://localhost:3000/api/absensi/', {
                    studentId: parseInt(studentId),
                    scheduleId: parseInt(scheduleId),
                    statusKehadiran,
                    pertemuan: parseInt(pertemuan),
                    materi
                }, {
                    headers: {
                        'X-API-TOKEN': token
                    }
                }).then(data => data.data);

                if (response.status === 201) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message,
                    });
                    window.location.reload();
                }
            } catch (error) {
                console.log(error);

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: error.response.data.errors || error.message,
                });
            }
        });
    });
</script>
