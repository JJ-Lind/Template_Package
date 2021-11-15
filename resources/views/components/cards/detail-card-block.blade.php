@props(['label', 'value'])

<div {{ $attributes }}>
    <dt class="text-sm font-medium text-gray-500 cursor-default">{{ $label }}</dt>
    <dd class="mt-1 text-sm text-gray-900">{!! $value !!}</dd>
</div>
