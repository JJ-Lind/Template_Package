@props(['containerClass', 'label', 'prepend', 'name', 'required', 'type'])

<div class="{{ $containerClass }}">
    <label class="block text-sm font-medium text-gray-700 pb-1" for="{{ $name }}">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="max-w-lg flex rounded-md shadow-sm">
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">{{ $prepend }}</span>
            <input {{ $attributes->merge(['class' => 'flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300']) }} autocomplete="{{ $name }}" id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"{{ $required ? ' required' : '' }}>
        </div>
    </div>
</div>
