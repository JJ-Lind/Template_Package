@props(['label', 'name', 'options', 'required' => false])

<label class="block text-sm font-medium text-{{ !$errors->has($attributes->wire('model')->value) ? 'gray' : 'red' }}-700" for="{{ Str::kebab($name) }}">{{ $label }}{{ $required ? ' *' : '' }}</label>
<select class="mt-1 block w-full py-2 px-3 border bg-white rounded-md shadow-sm focus:outline-none sm:text-sm {{ !$errors->has($attributes->wire('model')->value) ? 'border-gray-300 focus:border-indigo-500' : 'border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500' }}" {{ $attributes->merge() }} id="{{ Str::kebab($name) }}" name="{{ $name }}"{{ $required ? ' required' : '' }}>
    <option value="" selected>{{ __('Select an Option') }}</option>
    @foreach($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>
@error($attributes->wire('model')->value)<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
