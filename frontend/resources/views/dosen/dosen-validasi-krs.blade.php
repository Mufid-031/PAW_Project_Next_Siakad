{{-- {{ dd($teacher) }} --}}
<x-dosen-layout :teacher="$teacher">
    <x-layout>
        <main class="mr-20 ml-20 mt-5">
            <div class="container mx-auto p-6">
                <h2 class="text-2xl font-bold text-center mb-6 text-black">Validasi Kartu Rencana Studi (KRS)</h2>
                
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">NIM</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Nama</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Program Studi</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Status KRS</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teacher['data']['teacher']['students'] as $student)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $student['nim'] }}</td>
                                        <td class="px-4 py-2 border-b">{{ $student['user']['name'] }}</td>
                                        <td class="px-4 py-2 border-b">{{ $student['programStudi'] }}</td>
                                        <td class="px-4 py-2 border-b">
                                            @if($student['enrollments'][0]['isValidated'])
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tervalidasi</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu Validasi</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                            @if($student['enrollments'][0]['isValidated'])
                                                <button class="px-4 py-2 rounded-md bg-gray-500 text-white text-sm font-semibold cursor-not-allowed">Sudah Validasi</button>
                                            @else
                                                <button class="px-4 py-2 rounded-md bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">Validasi</button>
                                            @endif
                                            <a href="{{ route('dosen.detail.krs') }}" class="px-4 py-2 rounded-md bg-green-600 text-white text-sm font-semibold hover:bg-green-700">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </x-layout>
</x-dosen-layout>
