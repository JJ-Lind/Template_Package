@props(['link'])

<a {{ $attributes(['class' => 'py-2 leading-6 whitespace-nowrap uppercase align-middle text-sm hover:text-red-600 transition ease-in-out duration-300']) }}>
    {{ $link }}
</a>
