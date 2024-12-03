<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-6 py-8">
            <div class="mb-6">
                <div class="flex gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Cari dosen..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ultramarine-500 focus:border-ultramarine-500">
                    </div>
                    <select
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-ultramarine-500 focus:border-ultramarine-500">
                        <option value="">Semua Fakultas</option>
                        <option value="teknik">Fakultas Teknik</option>
                        <option value="">Fakultas Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($teachers['data'] as $teacher)
                    <div
                        class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="bg-ultramarine-100 p-3 rounded-full">
                                    <x-ionicon-person-circle-outline class="w-8 h-8 text-ultramarine-900" />
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $teacher['name'] . ', ' . $teacher['teacher']['gelar'] }}
                                    </h3>
                                    <p class="text-sm text-gray-500">NIP: {{ $teacher['teacher']['nip'] }}</p>
                                </div>
                            </div>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center gap-3">
                                    <x-ionicon-school-outline class="w-5 h-5 text-ultramarine-900" />
                                    <span
                                        class="text-gray-700">{{ $teacher['teacher']['faculty'] ?? 'Fakultas Teknik' }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <x-ionicon-mail-outline class="w-5 h-5 text-ultramarine-900" />
                                    <span class="text-gray-700">{{ $teacher['email'] }}</span>
                                </div>
                            </div>

                            <button type="button" onclick="openModal('{{ $teacher['id'] }}')"
                                class="w-full py-2 px-4 bg-ultramarine-900 text-white rounded-lg hover:bg-ultramarine-800 transition-colors duration-200 flex items-center justify-center gap-2">
                                <span>Lihat Detail</span>
                                <x-ionicon-arrow-forward-outline class="w-4 h-4" />
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>

<x-teacher-modal :teachers="$teachers['data']" />
