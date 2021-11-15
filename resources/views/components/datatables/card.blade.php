@props(['title', 'actions' => null, 'body', 'footer'])

<div {{ $attributes(['class' => 'relative flex flex-col justify-between bg-white rounded-md h-auto w-full space-y-2 shadow-xl']) }}>
    <div class="flex flex-nowrap items-center justify-between w-full px-8 py-6 mx-auto">
        <h3 class="inline-flex items-center font-bold text-2xl">
            {{ $title }}
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
    <div class="px-10 py-4">
        {{ $footer }}
    </div>
</div>
