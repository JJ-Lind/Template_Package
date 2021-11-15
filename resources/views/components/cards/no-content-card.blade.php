@props(['icon', 'mainText', 'subText', 'buttonText', 'buttonRoute'])

<div {{ $attributes->merge(['class' => 'p-3 my-5 bg-white shadow rounded-lg overflow-hidden sm:p-6']) }}>
    <div class="text-center">
        {{ $icon }}
        <h3 class="mt-2 text-sm font-medium text-gray-900">{{ $mainText }}</h3>
        <p class="mt-1 text-sm text-gray-500">
            {{ $subText }}
        </p>
        <div class="mt-6">
            <x-buttons.split-button href="{{ $buttonRoute }}" text="{{ $buttonText }}">
                <x-slot name="icon">
                    <x-icons.plus class="-ml-1 mr-2 h-5 w-5"/>
                </x-slot>
            </x-buttons.split-button>
        </div>
    </div>
</div>
