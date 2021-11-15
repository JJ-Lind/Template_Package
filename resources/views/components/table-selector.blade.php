@props([
    'count' => null,
    'title',
    'selected' => false
])

<a {{ $attributes->class(['w-1/4 py-3 px-1 text-center border-b-2 font-medium text-sm cursor-pointer transition ease-in-out duration-300', 'border-indigo-500 text-indigo-600 border-b-2 font-bold' => $selected, 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 ' => !$selected]) }} aria-current="{{ Str::snake($title) }}">
    {{ $title }}
    @isset($count)<span class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block {{ $selected ? 'bg-purple-100 text-purple-600' : 'bg-gray-100 text-gray-900 ' }}">{{ $count }}</span>@endisset
</a>
