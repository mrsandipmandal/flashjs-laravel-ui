@props([
    'id' => $id ?? 'flash-modal-'.uniqid(),
    'title' => $title ?? 'Modal Title',
])

<div class="inline-block">
    <button type="button"
        class="px-3 py-2 rounded-md border"
        data-flash-modal-open="{{ $id }}">
        {{ $trigger ?? 'Open Modal' }}
    </button>

    <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden"
         id="{{ $id }}"
         data-flash-modal>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <div class="px-4 py-3 border-b flex justify-between items-center">
                <h2 class="font-semibold text-lg">{{ $title }}</h2>
                <button type="button" data-flash-modal-close>&times;</button>
            </div>
            <div class="p-4">
                {{ $slot }}
            </div>
            <div class="px-4 py-3 border-t text-right">
                <button type="button" class="mr-2" data-flash-modal-close>Close</button>
            </div>
        </div>
    </div>
</div>
