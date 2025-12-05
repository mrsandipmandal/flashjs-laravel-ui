@props([
    'id' => $id ?? 'flash-datepicker-'.uniqid(),
    'mode' => $mode ?? 'single',
    'enableTime' => $enableTime ?? false,
    'lib' => $lib ?? 'flatpickr',
])

<input
    type="text"
    id="{{ $id }}"
    {{ $attributes->merge([
        'class' => 'flash-datepicker form-input',
        'data-flash-datepicker' => true,
        'data-flash-datepicker-lib' => $lib,
        'data-flash-datepicker-mode' => $mode,
        'data-flash-datepicker-time' => $enableTime ? '1' : '0',
    ]) }}
/>
