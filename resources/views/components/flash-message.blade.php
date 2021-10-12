<template x-data="{ flash: true }" x-if="flash">
    <div {{ $attributes->merge(['class' => "border px-4 py-3 mb-2 rounded-md relative bg-$type-100 border-$type-400 text-$type-700"]) }} role="alert">
        <strong class="font-bold">{{ $type == 'green' ? __('Success!') : __('Warning!') }}</strong>
        <span class="block sm:inline">{{ $message }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="flash = false"><x-icons.x class="h-6 w-6 text-red-500 cursor-pointer"/></span>
    </div>
</template>
