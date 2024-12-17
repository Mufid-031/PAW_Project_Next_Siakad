<x-dosen-layout :teacher="$teacher">
    <x-layout>
        <main class="mr-20 ml-20 mt-5">
            <div class="container mx-auto p-6">
                <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Daftar Mahasiswa Bimbingan</h2>
                
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">NIM</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Nama</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Program Studi</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Semester</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Total SKS</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 border border-gray-300">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3 text-sm border border-gray-300">{{ $student['nim'] }}</td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">{{ $student['name'] }}</td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">{{ $student['program_study'] }}</td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">{{ $student['semester'] }}</td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">{{ $student['total_sks'] }}</td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-blue-800">
                                                {{ $student['status'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 text-sm border border-gray-300">
                                            <a href="{{ route('student.detail', $student['id']) }}" class="text-gray-600 hover:text-gray-900">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-3 text-center text-sm text-gray-500">
                                            Tidak ada mahasiswa bimbingan yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
