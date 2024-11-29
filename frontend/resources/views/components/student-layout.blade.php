@props([
    'token' => null
])

<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <x-student-navbar token="{{ $token }}" />

    {{-- <x-student-sidebar /> --}}

    {{ $slot }}
</div>
