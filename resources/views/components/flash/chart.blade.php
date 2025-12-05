@props([
    'id' => $id ?? 'flash-chart-'.uniqid(),
    'type' => $type ?? 'line',
    'engine' => $engine ?? config('flashjs.default_chart', 'chartjs'),
    'options' => $options ?? [],
    'data' => $data ?? [],
])

<div
    data-flash-chart
    data-flash-chart-id="{{ $id }}"
    data-flash-chart-type="{{ $type }}"
    data-flash-chart-engine="{{ $engine }}"
    data-flash-chart-data='@json($data)'
    data-flash-chart-options='@json($options)'
>
    @if($engine === 'chartjs')
        <canvas id="{{ $id }}"></canvas>
    @else
        <div id="{{ $id }}"></div>
    @endif
</div>
