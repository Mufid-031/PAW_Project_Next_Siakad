@props([
    'description' => '',
    'role' => '',
    'formItems' => [],
])

<x-form id="{{ strtolower($description) }}-form">
    <x-form.description>
        {{ $description . ' ' . $role }}
    </x-form.description>

    <div id="alert-info"></div>
    
    @foreach ( $formItems as $item )
        <x-form.item>
            <x-form.label>{{ $item['label'] }}</x-form.label>
            <x-input 
                x-form:control
                placeholder="Your {{ $item['label'] }}"
                class="w-96"
                name="{{ $item['name'] }}"
                id="{{ $item['id'] }}"
            />
            <x-form.message />
        </x-form.item>
    @endforeach

    <x-button type="submit">{{ $description }}</x-button>
</x-form>