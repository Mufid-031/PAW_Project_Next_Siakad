{{-- {{ dd($courses) }} --}}

<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <x-admin-card :students="$students" :teachers="$teachers" :courses="$courses" :schedules="$schedules" />
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Aktifitas Terbaru</h2>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="logsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aktifitas</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pengguna</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                            </tr>
                        </thead>
                        <tbody id="logsBody" class="bg-white divide-y divide-gray-200"></tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="px-6 py-4">
                    <div id="paginationControls" class="flex justify-center space-x-2"></div>
                </div>
            </div>
        </div>

        <script>
            const logs = @json($logs['data']); // Data dari backend
            const logsPerPage = 10; // Jumlah log per halaman
            let currentPage = 1;

            // Fungsi untuk render tabel log
            function renderLogsTable(page) {
                const startIndex = (page - 1) * logsPerPage;
                const endIndex = startIndex + logsPerPage;
                const currentLogs = logs.slice(startIndex, endIndex);

                const logsBody = document.getElementById('logsBody');
                logsBody.innerHTML = '';

                currentLogs.forEach(log => {
                    const logRow = `
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <p class="text-gray-900">${new Date(log.createdAt).toLocaleDateString('id-ID')}</p>
                                <p class="text-gray-500">${new Date(log.createdAt).toLocaleTimeString('id-ID')}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex leading-5 font-semibold">${log.action}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">${log.user.name}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">${log.user.email}</td>
                        </tr>
                    `;
                    logsBody.innerHTML += logRow;
                });
            }

            // Fungsi untuk render pagination controls
            function renderPaginationControls() {
                const totalPages = Math.ceil(logs.length / logsPerPage);
                const paginationControls = document.getElementById('paginationControls');
                paginationControls.innerHTML = '';

                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement('button');
                    button.innerText = i;
                    button.className =
                        `px-4 py-2 rounded ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700'}`;
                    button.addEventListener('click', () => {
                        currentPage = i;
                        renderLogsTable(currentPage);
                        renderPaginationControls();
                    });
                    paginationControls.appendChild(button);
                }
            }

            // Inisialisasi
            renderLogsTable(currentPage);
            renderPaginationControls();
        </script>
    </x-admin-sidebar>
</x-admin-layout>
