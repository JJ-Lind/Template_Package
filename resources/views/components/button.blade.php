<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
