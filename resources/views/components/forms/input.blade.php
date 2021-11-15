@props(['label', 'name', 'required' => false])

<label class="block text-sm font-medium {{ !$errors->has($attributes->wire('model')->value) ? 'text-gray-700' : 'text-red-700' }}" for="{{ Str::kebab($name) }}" >{{ $label }}{{ $required ? ' *' : '' }}</label>
<div class="mt-1 relative rounded-md shadow-sm">
    <input class="block w-full focus:outline-none sm:text-sm rounded-md {{ !$errors->has($attributes->wire('model')->value) ? 'focus:ring-indigo-500 focus:border-indigo-500 border-gray-300' : 'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500' }}" id="{{ Str::kebab($name) }}" name="{{ $name }}" {{ $attributes->merge() }}>
    @error($attributes->wire('model')->value)
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <x-icons.exclamation-circle class="h-5 w-5 text-red-500"/>
        </div>
    @enderror
</div>
@error($attributes->wire('model')->value)<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
