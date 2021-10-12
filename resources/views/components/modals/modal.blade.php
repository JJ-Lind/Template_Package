@props(['icon', 'header', 'body', 'footer', 'modal'])

<div {{ $attributes(['class' => 'fixed z-50 inset-0 overflow-y-auto']) }} aria-labelledby="modal-title" role="dialog" aria-modal="true"
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-show="show"
    x-cloak>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="$set('{{ $modal }}', false)"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        {{ $icon }}
                    </div>
                    <div class="w-full mr-4 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            {{ $header }}
                        </h3>
                        <div class="mt-2">
                            {{ $body }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex justify-end">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
