<nav class="absolute top-0 right-0 z-40 flex items-center p-4 bg-transparent">
    <div class="flex flex-nowrap items-center justify-between w-full px-6 mx-auto">
        <div class="inline-flex items-center">
            <a class="py-2 leading-6 whitespace-nowrap uppercase align-middle text-sm text-white hover:text-gray-100" href="{{ $active_route ?? '#' }}">{{ $active_page ?? config('app.name') }}</a>
        </div>
        <div class="inline-flex items-center justify-end">
            <ul class="flex flex-row space-x-2">
                <x-navbar.dropdown>
                    <x-slot name="title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-slot>
                    <x-slot name="list">
                        <x-navbar.subaction action="Localization 1" :border="false" href="#" :symbol="file_get_contents('storage/flags/gb.svg')"/>
                        <x-navbar.subaction action="Localization 2" :border="false" href="#" :symbol="file_get_contents('storage/flags/nl.svg')"/>
                        <x-navbar.subaction action="Localization 3" :border="false" href="#" :symbol="false"/>
                    </x-slot>
                </x-navbar.dropdown>
            </ul>
        </div>
    </div>
</nav>
