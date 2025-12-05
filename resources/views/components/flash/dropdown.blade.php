@props([
    'label' => $label ?? 'Dropdown',
    'placement' => $placement ?? 'bottom-start',
])

<div class="relative inline-block" data-flash-dropdown data-placement="{{ $placement }}">
    <button type="button" class="px-3 py-2 border rounded-md" data-flash-dropdown-toggle>
        {{ $label }}
    </button>

    <div class="hidden absolute mt-2 w-48 bg-white border rounded-md shadow-lg z-50"
         data-flash-dropdown-menu>
        <div class="py-1">
            {{ $slot }}
        </div>
    </div>
</div>
