@props([
    'token' => null
])

<div class="antialiased bg-gray-50">
    <x-student-navbar token="{{ $token }}" />

    {{-- <x-student-sidebar /> --}}

    {{ $slot }}
</div>
