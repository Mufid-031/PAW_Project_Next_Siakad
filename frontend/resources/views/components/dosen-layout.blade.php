@props([
    'token' => null
    'teacher' => null
])

<div class="antialiased bg-gray-50">
    <x-dosen-navbar token="{{ $token }}":teacher="$teacher" />

    {{-- <x-student-sidebar /> --}}

    {{ $slot }}
</div>