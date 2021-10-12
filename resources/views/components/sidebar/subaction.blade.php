@props(['minified', 'action', 'active'])

<a {{ $attributes->class(['flex flex-nowrap py-2 rounded-full cursor-pointer transition ease-in-out duration-300', 'bg-white hover:bg-gray-200 text-red-700 hover:text-red-600' => $active, 'hover:bg-red-600 text-white' => !$active]) }}>
    <div class="flex justify-center items-center w-1/6 mx-3 py-2 font-bold text-sm opacity-50">
        <span>{{ $minified }}</span>
    </div>
    <div class="flex items-center w-5/6 mr-4 py-2 items-center overflow-hidden whitespace-nowrap uppercase text-xs">
        <span>{{ $action }}</span>
    </div>
</a>
