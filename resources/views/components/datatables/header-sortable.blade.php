@props(['label', 'field', 'sortField', 'sortAsc'])

<button wire:click="sortBy('{{ $field }}')" {{ $attributes(['class' => 'flex justify-start w-full text-xs font-medium text-gray-500 uppercase tracking-wider', 'type' => 'button']) }}>
    <span>{{ $label }}</span>
    @if ($sortField == $field && $sortAsc)
        <x-icons.chevron-up class="h-3 w-3 ml-3"/>
    @elseif($sortField == $field && !$sortAsc)
        <x-icons.chevron-down class="h-3 w-3 ml-3"/>
    @endif
</button>
