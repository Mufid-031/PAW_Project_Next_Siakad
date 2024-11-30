<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-8">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Profile Card -->
                    @foreach ($teachers['data'] as $key => $teacher)
                        <div class="bg-white p-6 rounded-lg shadow-md relative">
                            <h2 class="text-xl font-semibold mb-4">Profil Dosen {{ $key + 1 }}</h2>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <x-ionicon-person-circle-outline class="w-6 h-6 text-ultramarine-900" />
                                    <span>{{ $teacher['name'] . ', ' . $teacher['teacher']['gelar'] }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <x-ionicon-card-outline class="w-6 h-6 text-ultramarine-900" />
                                    <span>NIP: {{ $teacher['teacher']['nip'] }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <x-ionicon-school-outline class="w-6 h-6 text-ultramarine-900" />
                                    <span>Fakultas Teknik</span>
                                </div>
                                <button type="button" onclick="openModal('{{ $key + 1 }}')"
                                    class="text-white bg-ultramarine-900 hover:bg-ultramarine-800 focus:outline-none focus:ring-4 focus:ring-ultramarine-300 font-medium rounded-lg text-sm p-2 text-center me-2 mb-2 absolute right-4 bottom-4">
                                    Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>


{{-- Pop Up Modal --}}
<x-teacher-modal :teachers="[
    [
        'id' => '1',
        'name' => 'Dr. Noor Ifada, ST., MISD.',
        'nip' => '198505152010121002',
        'faculty' => 'Fakultas Teknik',
        'expertise' => 'Sistem Informasi, Data Mining, Data Warehouse',
        'publications' => [
            'Ifada, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
            'Ifada, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
        ],
    ],
    [
        'id' => '2',
        'name' => 'Ika Oktavia Suzanti, S.Kom.,M.Cs',
        'nip' => '198810182015042004',
        'faculty' => 'Fakultas Teknik',
        'expertise' => 'Pemrograman Web, Sistem Informasi, Data Mining',
        'publications' => [
            'Suzanti, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
            'Suzanti, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
        ],
    ],
    [
        'id' => '3',
        'name' => 'Devie Rosa Anamisa. S.kom., M.kom.',
        'nip' => '198411042008122003',
        'faculty' => 'Fakultas Teknik',
        'expertise' => 'Pemrograman Web, Sistem Informasi, Data Mining',
        'publications' => [
            'Devie, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
            'Devie, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure numquam praesentium voluptatem doloremque laborum accusamus',
        ],
    ],
]" />
