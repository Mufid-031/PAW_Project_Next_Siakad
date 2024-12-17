<x-layout>
    <x-student-layout :student="$student">
        <div class="container mx-auto px-6 py-8">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Pengumuman</h2>
                        <p class="text-gray-600 mt-1">Semua data pengumuman yang tersedia</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @if ($announcements == null)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="p-5">
                            <div class="text-center">
                                <h3 class="text-lg font-semibold text-gray-800">Tidak ada pengumuman</h3>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($announcements['data'] as $announcement)
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="p-5">
                                <!-- Judul Pengumuman -->
                                <h3 class="text-2xl font-semibold text-gray-800 mb-3">{{ $announcement['judul'] }}</h3>

                                <!-- Konten Pengumuman (Formatted like Markdown) -->
                                <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl max-w-none">
                                    {!! nl2br(e($announcement['konten'])) !!}
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </x-student-layout>
</x-layout>
