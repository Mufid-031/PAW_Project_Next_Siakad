@props([
    'token' => null
])

<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <x-admin-navbar token="{{ $token }}" />

    <x-admin-sidebar />

    {{ $slot }}
</div>