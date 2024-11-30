@props(['label', 'value'])

<div class="mb-2">
    <p class="text-sm font-medium text-gray-500">{{ $label ?? '' }}</p>
    <p class="text-sm text-gray-900">{{ $value }}</p>
</div>
