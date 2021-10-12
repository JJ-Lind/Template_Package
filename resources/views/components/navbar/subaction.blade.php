@props(['action', 'border', 'symbol'])

<a {{ $attributes->class(['block w-full p-2 whitespace-nowrap text-left text-gray-500 hover:text-gray-800 transition-all', 'border-b border-opacity-20 border-gray-700' => $border, 'flex justify-content-between' => $symbol]) }}>
    @if($symbol)
        <div class="w-1/6 mr-2 flex items-center whitespace-nowrap">
            {!! $symbol !!}
        </div>
        <div class="w-5/6 flex items-center whitespace-nowrap">
            {{ $action }}
        </div>
    @else
        {{ $action }}
    @endif
</a>
