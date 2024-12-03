<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <!-- Page Header -->
            <div
                class="mb-10 p-8 bg-gradient-to-r from-ultramarine-600 to-ultramarine-500 rounded-3xl text-white shadow-lg">
                <div class="flex items-center space-x-4">
                    <i class="fas fa-cogs text-4xl opacity-90"></i>
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Layanan Administrasi</h2>
                        <p class="mt-2 text-ultramarine-100">Kelola berbagai layanan administrasi akademik dengan mudah
                            dan efisien</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Beasiswa Card -->
                <div
                    class="bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 group overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-ultramarine-50 rounded-2xl">
                                <i class="fas fa-graduation-cap text-2xl text-ultramarine-500"></i>
                            </div>
                            <span
                                class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Beasiswa</h3>
                        <p class="text-gray-600 mb-6 text-sm">Kelola program beasiswa dan penerima beasiswa secara
                            efektif</p>
                        <a href=""
                            class="inline-flex items-center justify-between w-full px-4 py-3 text-sm font-semibold text-ultramarine-600 hover:bg-ultramarine-50 rounded-xl transition-colors group">
                            <span>Kelola Beasiswa</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Pembayaran Card -->
                <div
                    class="bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 group overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-green-50 rounded-2xl">
                                <i class="fas fa-credit-card text-2xl text-green-500"></i>
                            </div>
                            <span
                                class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pembayaran</h3>
                        <p class="text-gray-600 mb-6 text-sm">Kelola pembayaran SPP dan biaya kuliah dengan sistematis
                        </p>
                        <a href=""
                            class="inline-flex items-center justify-between w-full px-4 py-3 text-sm font-semibold text-green-600 hover:bg-green-50 rounded-xl transition-colors group">
                            <span>Kelola Pembayaran</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Pengumuman Card -->
                <div
                    class="bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 group overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-orange-50 rounded-2xl">
                                <i class="fas fa-bullhorn text-2xl text-orange-500"></i>
                            </div>
                            <span
                                class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pengumuman</h3>
                        <p class="text-gray-600 mb-6 text-sm">Kelola pengumuman dan informasi kampus secara terpusat</p>
                        <a href=""
                            class="inline-flex items-center justify-between w-full px-4 py-3 text-sm font-semibold text-orange-600 hover:bg-orange-50 rounded-xl transition-colors group">
                            <span>Kelola Pengumuman</span>
                            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
