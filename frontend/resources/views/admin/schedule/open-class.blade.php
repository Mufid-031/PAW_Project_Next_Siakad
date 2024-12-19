<x-admin-layout>
    <x-admin-sidebar :admin="$admin">
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Buka Kelas Baru</h1>
                        <p class="text-gray-600 mt-1">Pilih jadwal untuk membuka kelas baru</p>
                    </div>

                    <form action="/admin/schedule/open-class" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Pilih Mata Kuliah
                                </label>
                                <select name="course_id" class="form-select w-full rounded-lg border-gray-300">
                                    @foreach ($courses['data'] as $course)
                                        <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Kuota Mahasiswa
                                </label>
                                <input type="number" name="quota"
                                    class="form-input w-full rounded-lg border-gray-300" min="1" max="100"
                                    required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Ruangan
                                </label>
                                <input type="text" name="room"
                                    class="form-input w-full rounded-lg border-gray-300" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Hari
                                </label>
                                <select name="day" class="form-select w-full rounded-lg border-gray-300">
                                    <option value="MONDAY">Senin</option>
                                    <option value="TUESDAY">Selasa</option>
                                    <option value="WEDNESDAY">Rabu</option>
                                    <option value="THURSDAY">Kamis</option>
                                    <option value="FRIDAY">Jumat</option>
                                    <option value="SATURDAY">Sabtu</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Waktu
                                </label>
                                <input type="time" name="time"
                                    class="form-input w-full rounded-lg border-gray-300" required>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="/admin/schedule"
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-ultramarine-500 text-white rounded-lg hover:bg-ultramarine-600">
                                Buka Kelas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-admin-sidebar>
</x-admin-layout>
