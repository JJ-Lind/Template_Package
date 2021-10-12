@props(['actions', 'header', 'body', 'footer'])

<div {{ $attributes }}
     x-data="{ show: @entangle($attributes->wire('model')) }"
     x-show="show"
     @keydown.escape.window="show = false"
     x-cloak>
    <div class="fixed inset-0 bg-gray-600 opacity-75" @click="show = false"></div>
    <div class="flex flex-col justify-between bg-white shadow-md max-w-lg h-56 m-auto mx-auto rounded-md fixed inset-0" x-show="show" x-transition>
        <div class="flex flex-nowrap items-center justify-between w-full p-6 mx-auto">
            <h3 class="inline-flex items-center font-bold text-2xl">
                {{ $header }}
            </h3>
            @isset($actions)
                <div class="inline-flex items-center justify-end space-x-4">
                    {{ $actions }}
                </div>
            @endisset
        </div>
        <div class="px-6 mb-4">
            {{ $body }}
        </div>
        <div class="flex justify-end px-6 py-4 space-x-4">
            {{ $footer }}
        </div>
    </div>
</div>
