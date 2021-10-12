@props(['active', 'border', 'minified', 'title', 'list'])

<div class="relative flex flex-col{{ $border ? ' pb-4 border-b border-opacity-50 border-white' : '' }}" x-data="{ show: {{ $active ? 'true' : 'false' }}} ">
    <div {{ $attributes->class(['flex flex-nowrap rounded-full cursor-pointer text-white transition ease-in-out duration-300', 'bg-red-700 hover:bg-red-600' => $active, 'hover:bg-red-600' => !$active]) }}>
        <div class="flex justify-center w-1/4 py-2 opacity-75">
            {{ $minified }}
        </div>
        <div class="w-3/4 mr-4 py-2 flex justify-between items-center whitespace-nowrap" @click="show = !show">
            <span class="max-w-150px overflow-hidden">{{ $title }}</span>
            <x-icons.chevron-up class="h-4 w-4" x-bind:class="show ? '' : 'hidden'" x-cloak/>
            <x-icons.chevron-down class="h-4 w-4" x-bind:class="show ? 'hidden' : ''"/>
        </div>
    </div>
    <div class="mt-4 space-y-3" x-show="show" x-transition x-cloak>
        {{ $list }}
    </div>
</div>
