@props(['title', 'list'])

<li class="relative h-12 w-16" x-data="{ show: false }">
    <div {{ $attributes(['class' => 'block flex justify-between items-center h-full w-full text-white hover:bg-gray-100 hover:bg-opacity-25 rounded-md cursor-pointer transition ease-in-out duration-300']) }} @click="show = !show">
        <div class="flex justify-center w-4/6">
            {{ $title }}
        </div>
        <div class="flex justify-center w-2/6 mx-1">
            <x-icons.chevron-up class="h-3 w-3" x-bind:class="show ? '' : 'hidden'" x-cloak/>
            <x-icons.chevron-down class="h-3 w-3" x-bind:class="show ? 'hidden' : ''"/>
        </div>
    </div>
    <div class="absolute top-14 right-0 left-auto flex flex-col space-y-2 p-2 min-w-10 bg-white shadow-md rounded-sm" @click.outside="show = false" x-show="show" x-cloak x-transition>
        {{ $list }}
    </div>
</li>
