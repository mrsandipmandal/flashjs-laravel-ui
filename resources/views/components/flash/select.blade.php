@props([
    'id' => $id ?? 'flash-select-'.uniqid(),
    'multiple' => $multiple ?? false,
    'search' => $search ?? true,
    'lib' => $lib ?? 'select2',
])

<select
    id="{{ $id }}"
    name="{{ $attributes->get('name') }}"
    {{ $multiple ? 'multiple' : '' }}
    {{ $attributes->merge([
        'class' => 'flash-select w-full',
        'data-flash-select' => true,
        'data-flash-select-lib' => $lib,
        'data-flash-select-search' => $search ? '1' : '0',
    ]) }}
>
    {{ $slot }}
</select>
