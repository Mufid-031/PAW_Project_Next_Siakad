{{-- {{ dd($enrollments) }} --}}
<x-student-layout :student="$student">
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg">
                <h1 class="text-2xl font-bold text-gray-800 ml-5 mt-5">Daftar Absensi</h1>
                
                <!-- Dropdown for Semester Selection -->
                <div class="mb-4 p-5">
                    <label for="semester-select" class="block text-sm font-medium text-gray-700">Pilih Semester:</label>
                    <div class="relative mt-1">
                        <select id="semester-select" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 10l5 5 5-5H7z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Containers for each semester -->
                @for ($i = 1; $i <= 8; $i++)
                    <div id="semester-{{ $i }}" class="semester-container hidden">
                        <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4 m-3 mx-auto">
                            @php
                                $isValidated = false;
                            @endphp
                            @foreach ($enrollments['data'] as $key => $enrollment)
                                @if ($enrollment['schedule']['course']['semester'] == 'semester_' . $i)
                                    @if ($enrollment['isValidated'] == true)
                                        @php
                                            $isValidated = true;
                                        @endphp
                                        <div class="bg-slate-100 rounded-lg p-6 shadow-md hover:shadow-lg transition-shadow duration-200 space-y-4">
                                            <div class="text-center space-y-1">
                                                <h2 class="text-lg font-semibold text-gray-800">{{$enrollment['schedule']['course']['name']}}</h2>
                                                <p class="text-gray-600">{{$enrollment['schedule']['course']['code']}}</p>
                                            </div>
                                            
                                            <div class="space-y-2">
                                                <a href="/student/absen/{{ $enrollment['scheduleId'] }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200 text-center">
                                                    ABSENSI →
                                                </a>

                                                <a href="/student/eval-dosen/{{ $enrollment['scheduleId'] }}" class="block w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200 text-center">
                                                    Form Evaluasi
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            @if (!$isValidated)
                                <h2 colspan="6" class="text-center border border-gray-200 px-4 py-3 text-sm text-gray-600">Anda Belum Melakukan Validasi KRS, Silahkan Lakukan validasi dengan dosen Anda</h2>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </main>
    </x-layout>
</x-student-layout>

<script>
    document.getElementById('semester-select').addEventListener('change', function() {
        const semester = this.value;
        // Sembunyikan semua kontainer semester
        document.querySelectorAll('.semester-container').forEach(container => {
            container.classList.add('hidden');
        });

        // Tampilkan kontainer semester yang dipilih
        document.getElementById('semester-' + semester).classList.remove('hidden');
    });

    // Tampilkan kontainer semester 1 secara default
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('semester-select').value = 1;
        document.getElementById('semester-1').classList.remove('hidden');
    });
</script>