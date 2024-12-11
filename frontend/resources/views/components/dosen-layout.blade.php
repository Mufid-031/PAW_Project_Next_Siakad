@props([
    'token' => null,
    'teacher' => null
])

<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <x-dosen-navbar token="{{ $token }}" :teacher="$teacher" />

    {{ $slot }}
</div>
