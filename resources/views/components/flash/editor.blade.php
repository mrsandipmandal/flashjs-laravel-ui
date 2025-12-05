@props([
    'id' => $id ?? 'flash-editor-'.uniqid(),
    'name' => $name ?? 'content',
    'engine' => $engine ?? config('flashjs.editor', 'quill'),
])

<div
    data-flash-editor
    data-flash-editor-id="{{ $id }}"
    data-flash-editor-engine="{{ $engine }}"
>
    <textarea id="{{ $id }}" name="{{ $name }}" class="hidden">{{ $slot }}</textarea>
    <div data-flash-editor-target></div>
</div>
