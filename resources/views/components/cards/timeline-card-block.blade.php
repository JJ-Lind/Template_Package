@props(['count', 'icon', 'subject', 'text', 'time'])

<li>
    <div class="relative pb-8">
        @if($count != 1)<span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>@endif
        <div class="relative flex space-x-3">
            <div>
                <span {{ $attributes->merge(['class' => 'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white']) }}>
                    {{ $icon }}
                </span>
            </div>
            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                <div>
                    <p class="text-sm text-gray-500">{{ $text }} <span class="font-medium text-gray-900">{{ $subject }}</span></p>
                </div>
                <div class="text-right text-sm whitespace-nowrap text-gray-500 cursor-default">
                    <time datetime="{{ $time }}">{{ \Carbon\Carbon::create($time)->format('M j') }}</time>
                </div>
            </div>
        </div>
    </div>
</li>
