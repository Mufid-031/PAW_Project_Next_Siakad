<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8" x-data="logManagement()">
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
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aktifitas</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pengguna</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="logsBody">
                            <template x-if="paginatedLogs.length > 0">
                                <template x-for="log in paginatedLogs" :key="log.id">
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <p class="text-gray-900" x-text="formatDate(log.createdAt)"></p>
                                            <p class="text-gray-500" x-text="formatTime(log.createdAt)"></p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 inline-flex leading-5 font-semibold" x-text="log.action"></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900" x-text="log.user.name"></div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-500" x-text="log.user.email"></td>
                                    </tr>
                                </template>
                            </template>
                            <template x-if="paginatedLogs.length === 0">
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data aktivitas
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Controls -->
                <div class="px-6 py-4">
                    <div id="paginationControls" class="flex justify-center space-x-2">
                        <template x-for="page in totalPages" :key="page">
                            <button @click="currentPage = page"
                                :class="{'bg-blue-500 text-white': currentPage === page, 'bg-gray-200 text-gray-700': currentPage !== page}"
                                class="px-4 py-2 rounded"
                                x-text="page"></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function logManagement() {
                return {
                    logs: @json($logs['data'] ?? []),
                    currentPage: 1,
                    logsPerPage: 10,
                    get paginatedLogs() {
                        if (!this.logs || this.logs.length === 0) {
                            return [];
                        }
                        const startIndex = (this.currentPage - 1) * this.logsPerPage;
                        const endIndex = startIndex + this.logsPerPage;
                        return this.logs.slice(startIndex, endIndex);
                    },
                    get totalPages() {
                        return this.logs ? Math.ceil(this.logs.length / this.logsPerPage) : 0;
                    },
                    formatDate(dateString) {
                        return new Date(dateString).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                    },
                    formatTime(dateString) {
                        return new Date(dateString).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                    }
                }
            }
        </script>
    </x-admin-sidebar>
</x-admin-layout>
