<div>
    @if($shown)
        <div aria-live="assertive" class="fixed inset-0 flex items-end px-12 py-8 pointer-events-none z-50 sm:p-12 sm:items-start">
            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 items-center">
                                @switch($styles['icon'])
                                    @case('info')
                                        <x-icons.information-circle class="h-5 w-5 {{ $styles['icon-color'] }}"/>
                                        @break
                                    @case('success')
                                        <x-icons.tick class="h-5 w-5 {{ $styles['icon-color'] }}"/>
                                        @break
                                    @case('warning')
                                        <x-icons.hand class="h-5 w-5 {{ $styles['icon-color'] }}"/>
                                        @break
                                    @case('error')
                                        <x-icons.warning class="h-5 w-5 {{ $styles['icon-color'] }}"/>
                                        @break
                                @endswitch
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">{!! $message['message'] !!}</p>
                            </div>
                            @if ($message['dismissible'] ?? false)
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 transition-all" wire:click="$set('shown', false)">
                                        <span class="sr-only">{{ __('Close') }}</span>
                                        <x-icons.x class="h-5 w-5"/>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
