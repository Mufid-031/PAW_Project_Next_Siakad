{{-- {{ dd($courses) }} --}}
<x-student-layout :student="$student">    
    <x-layout>
        <main class="ml-20 mr-20 mt-5">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Header Section -->
                <div class="border-b border-gray-200 mb-6">
                    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">
                        Tambah Mata Kuliah
                    </h1>
                    <p class="text-gray-600 mb-4 text-center">
                        Pilih semester untuk melihat daftar mata kuliah yang tersedia.
                    </p>
                </div>
                <!-- Semester Buttons -->
                <div class="flex flex-wrap justify-center mb-6">
                    <button onclick="showSemester(1)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 1
                    </button>
                    <button onclick="showSemester(2)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 2
                    </button>
                    <button onclick="showSemester(3)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 3
                    </button>
                    <button onclick="showSemester(4)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 4
                    </button>
                    <button onclick="showSemester(5)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 5
                    </button>
                    <button onclick="showSemester(6)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 6
                    </button>
                    <button onclick="showSemester(7)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 7
                    </button>
                    <button onclick="showSemester(8)" class="m-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                        Semester 8
                    </button>
                </div>
                <form id="add-krs">
                    <button type="submit" class="bg-green-600 text-white font-medium py-2 px-4 rounded-lg">
                        Tambah
                    </button>
                    <a href="/student/krs" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg ">
                        Batal
                    </a>
                    <!-- Tables for each semester -->
                    <div id="semester-1" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 1</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_1')
                                            @php
                                                $key = (int) $key;
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-2" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 2</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_2')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-3" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 3</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_3')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-4" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 4</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_4')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-5" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 5</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_5')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="semester-6" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 6</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_6')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-7" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 7</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_7')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div id="semester-8" class="semester-table hidden">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Semester 8</h2>
                        <div class="overflow-x-auto mb-4">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">No</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Kode Kelas</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Mata Kuliah</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Semester</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">Jadwal</th>
                                        <th class="border border-gray-200 px-4 py-3 text-left text-sm font-semibold text-gray-600">SKS</th>
                                        <th class="border border-gray-200 px-4 py-3 text-center text-sm font-semibold text-gray-600">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses['data'] as $key => $course)
                                        @if ($course['semester'] === 'semester_8')
                                            @php
                                                $key = (int) $key; // Konversi $key menjadi integer 
                                            @endphp
                                            <tr class="hover:bg-gray-50">
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $key + 1 }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['code'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['semester'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">
                                                    @if (isset($course['schedule'][0]))
                                                        {{ $course['schedule'][0]['day'] }} {{ $course['schedule'][0]['time'] }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="border border-gray-200 px-4 py-3 text-sm text-gray-600">{{ $course['sks'] }}</td>
                                                <td class="border border-gray-200 px-4 py-3 text-center">
                                                    <input type="checkbox" name="scheduleId" value="{{ $course['schedule'][0]['id'] }}" class="form-checkbox h-5 w-5 text-blue-600">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </x-layout>
</x-student-layout>

<script>
    const form = document.querySelector('#add-krs');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const scheduleId = [];
        document.querySelectorAll('input[name="scheduleId"]:checked').forEach((checkbox) => {
            scheduleId.push(parseInt(checkbox.value));
        });
        try {
            const token = await axios.post('/token/get-token').then(res => res.data);
            console.log(scheduleId);
            const response = await axios.post('http://localhost:3000/api/enrollment/register', {
                scheduleId
            }, {
                headers: {
                    'X-API-TOKEN': token
                }
            }).then(data => data.data);
            if (response.status === 201) {
                alert('Success Register Course');
                window.location.replace('http://127.0.0.1:8000/student/krs')
            }
        } catch (error) {
            console.log(error);
        }
    });
</script>

<script>
    function showSemester(semester) {
        const table = document.getElementById('semester-' + semester);
        if (table.classList.contains('hidden')) {
            // Hide all semester tables
            document.querySelectorAll('.semester-table').forEach(table => {
                table.classList.add('hidden');
            });
            // Show the selected semester table
            table.classList.remove('hidden');
        } else {
            // Hide the selected semester table
            table.classList.add('hidden');
        }
    }
</script>