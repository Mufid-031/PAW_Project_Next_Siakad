<x-layout>
    <x-student-layout :student="$student">
        <main class="ml-20 mr-20 mt-5">
            <div class="max-w-6xl mx-auto p-6">
                <a href="/student/sivitas" class="flex items-center text-gray-600 hover:text-gray-900 mb-6">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="border-b pb-4 mb-4">
                        <h1 class="text-2xl font-bold text-gray-800">Matkul 1</h1>
                        <p class="text-gray-600">Kelas A</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dosen Pengampu</h3>
                            <p class="text-gray-800">Imam Fahrur Rozi, ST., MT.</p>
                        </div>
                        {{-- <div>
                            <h3 class="text-sm font-medium text-gray-500">Semester</h3>
                            <p class="text-gray-800">Gasal 2024/2025</p>
                        </div> --}}
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-800">Form Evaluasi</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <form action="#" method="POST">
                            <div class="mb-4 ml-6 mr-6">
                                <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                                <select name="nilai" id="nilai" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    <option value="">Pilih Nilai</option>
                                    <option value="S">S</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
        
                            <div class="mb-4 ml-6 mr-6">
                                <label for="komentar" class="block text-sm font-medium text-gray-700">Komentar</label>
                                <textarea name="komentar" id="komentar" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                            </div>
        
                            <div class="flex justify-end mr-6">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </x-student-layout>
</x-layout>