@props(['minified', 'action', 'active'])

<a {{ $attributes->class(['flex flex-nowrap py-2 rounded-full cursor-pointer transition ease-in-out duration-300', 'bg-white hover:bg-gray-200 hover:text-red-600' => $active, 'hover:bg-red-600 text-white' => !$active]) }}>
    <div class="flex justify-center w-1/4 py-2 opacity-75">
        {{ $minified }}
    </div>
    <div class="w-3/4 mr-4 py-2 flex justify-between items-center whitespace-nowrap">
        <span class="max-w-150px overflow-hidden">{{ $action }}</span>
    </div>
</a>
