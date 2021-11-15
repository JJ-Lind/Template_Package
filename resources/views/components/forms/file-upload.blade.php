@props(['icon', 'label', 'name', 'required' => false])

<div {{ $attributes->merge(['class' => 'sm:grid sm:grid-cols-6 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 col-span-6']) }}>
    <label class="block text-sm font-medium{{ $errors->has($name) ? ' text-red-700' : ' text-gray-700' }}" for="container">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <div class="sm:col-span-6">
        <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                {{ $icon }}
                <div class="flex text-sm text-gray-600">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
