@props(['description', 'title'])

<div {{ $attributes }}>
    <section aria-labelledby="{{ Str::kebab($title) }}">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6">
                <h2 id="{{ Str::kebab($title) }}-title" class="text-lg leading-6 font-medium text-gray-900 cursor-default">{{ $title }}</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 cursor-default">{{ $description }}</p>
            </div>
            <div class="border-t border-gray-200 p-4 sm:px-6">
                <dl class="grid grid-cols-2 gap-x-4 gap-y-8 lg:grid-cols-4">
                    {{ $slot  }}
                </dl>
            </div>
        </div>
    </section>
</div>
