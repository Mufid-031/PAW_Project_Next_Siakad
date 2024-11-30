@props(['teachers'])

@foreach ($teachers as $teacher)
    <div id="modal-{{ $teacher['id'] }}"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto hidden h-full w-full z-50">
        <div class="relative top-20 mx-auto p-8 border w-[640px] shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center border-b pb-4 mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Detail Profil Dosen</h3>
                <button onclick="closeModal('{{ $teacher['id'] }}')" class="text-gray-400 hover:text-gray-500">
                    <x-ionicon-close-outline class="w-6 h-6" />
                </button>
            </div>

            <div class="space-y-4 mb-8">
                <div class="flex items-center gap-3">
                    <x-ionicon-person-circle-outline class="w-6 h-6 text-ultramarine-900" />
                    <span class="font-medium">{{ $teacher['name'] }}</span>
                </div>
                <div class="flex items-center gap-3">
                    <x-ionicon-card-outline class="w-6 h-6 text-ultramarine-900" />
                    <span class="font-medium">{{ $teacher['nip'] }}</span>
                </div>
                <div class="flex items-center gap-3">
                    <x-ionicon-school-outline class="w-6 h-6 text-ultramarine-900" />
                    <span class="font-medium">{{ $teacher['faculty'] }}</span>
                </div>
            </div>
            <div class="mb-6">
                <h4 class="font-medium text-lg mb-3">Bidang Keahlian:</h4>
                <p class="text-gray-600 pl-2">{{ $teacher['expertise'] }}</p>
            </div>
            <div class="mb-8">
                <h4 class="font-medium text-lg mb-3">Publikasi:</h4>
                <ul class="list-disc ml-8 space-y-2 text-gray-600">
                    @foreach ($teacher['publications'] as $publication)
                        <li>{{ $publication }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="text-right pt-4 border-t">
                <button onclick="closeModal('{{ $teacher['id'] }}')"
                    class="px-6 py-2.5 bg-ultramarine-500 text-white text-sm font-medium rounded-md hover:bg-ultramarine-700 transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
@endforeach

@once
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }
    </script>
@endonce
