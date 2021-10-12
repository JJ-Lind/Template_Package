@props(['actions', 'primary_header', 'primary_body', 'primary_footer', 'secondary_header', 'secondary_body'])

<div {{ $attributes }}
     x-data="{ show: @entangle($attributes->wire('model')) }"
     x-show="show"
     @keydown.escape.window="show = false"
     x-cloak>
    <div class="fixed inset-0 bg-gray-600 opacity-75" @click="show = false"></div>
    <div class="fixed inset-0 flex justify-center items-center h-full w-full space-x-4">
        <div class="flex flex-col justify-between bg-white shadow-md max-w-lg h-56 rounded-md" x-show="show" x-transition>
            <div class="flex flex-nowrap items-center justify-between w-full p-6 mx-auto">
                <h3 class="inline-flex items-center font-bold text-2xl">
                    {{ $primary_header }}
                </h3>
                @isset($actions)
                    <div class="inline-flex items-center justify-end space-x-4">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
            <div class="px-6 mb-4">
                {{ $primary_body }}
            </div>
            <div class="flex justify-end px-6 py-4 space-x-4">
                {{ $primary_footer }}
            </div>
        </div>

        <div class="flex flex-col justify-between bg-white shadow-md min-w-md max-w-lg h-56 rounded-md" x-show="show" x-transition>
            <div class="flex flex-nowrap items-center justify-between w-full p-6 mx-auto">
                <h3 class="inline-flex items-center font-bold text-2xl">
                    {{ $secondary_header }}
                </h3>
            </div>
            <div class="px-6 mb-4 overflow-y-auto">
                {{ $secondary_body }}
            </div>
        </div>
    </div>
</div>
