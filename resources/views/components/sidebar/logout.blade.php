@props(['minified', 'action'])

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button {{ $attributes(['class' => 'flex flex-nowrap py-2 w-full rounded-full hover:bg-red-600 text-white cursor-pointer transition ease-in-out duration-300', 'type' => 'submit']) }}>
        <div class="flex justify-center items-center w-1/6 mx-3 py-2 font-bold text-sm opacity-50">
            <span>{{ $minified }}</span>
        </div>
        <div class="flex items-center w-5/6 mr-4 py-2 items-center overflow-hidden whitespace-nowrap uppercase text-xs">
            <span>{{ $action }}</span>
        </div>
    </button>
</form>
