@props([
    'token' => null,
    'student' => null
])

<div class="antialiased bg-gray-50">
    <x-student-navbar token="{{ $token }}" :student="$student" />

    {{-- <x-student-sidebar /> --}}

    {{ $slot }}
</div>
