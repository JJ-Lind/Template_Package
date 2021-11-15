@props(['title', 'footer' => null])

<section aria-labelledby="{{ Str::kebab($title) }}" class="lg:col-start-3 lg:col-span-1">
    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
        <h2 id="{{ Str::kebab($title) }}-title" class="text-lg font-medium text-gray-900 cursor-default">{{ $title }}</h2>

        <div class="mt-6 flow-root">
            <ul role="list" class="-mb-8">
                {{ $slot }}
            </ul>
        </div>
        @isset($footer)
            <div class="mt-6 flex flex-col justify-stretch">
                {{ $footer }}
            </div>
        @endisset
    </div>
</section>
