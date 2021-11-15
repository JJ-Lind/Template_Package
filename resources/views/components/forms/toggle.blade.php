@props(['label', 'name'])

<div {{ $attributes }}>
    <button class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-checked="false" role="switch" type="button" value="{{ $name }}">
        <span class="sr-only">{{ $label }}</span>
        <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
            <span class="opacity-100 ease-in duration-200 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity" aria-hidden="true">
                <x-icons.x class="h-3 w-3 text-gray-400"/>
            </span>
            <span class="opacity-0 ease-out duration-100 absolute inset-0 h-full w-full flex items-center justify-center transition-opacity" aria-hidden="true">
                <x-icons.tick class="h-3 w-3 text-indigo-600"/>
            </span>
        </span>
    </button>
</div>
