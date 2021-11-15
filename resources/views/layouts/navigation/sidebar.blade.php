<div class="fixed top-0 bottom-0 left-0 max-h-full h-full w-260px py-2 z-30 shadow-lg bg-gradient-to-t from-red-700 to-red-800">
    <div class="relative p-3 z-10">
        <a class="flex flex-nowrap pb-3 border-b border-opacity-50 border-white" href="#">
            <span class="block ml-3 py-2 w-1/6 text-center uppercase text-white">{{ config('app.abbreviation') }}</span>
            <span class="block ml-3 py-2 w-5/6 overflow-hidden uppercase whitespace-nowrap text-white">{{ config('app.name') }}</span>
        </a>
    </div>
    <div class="relative h-full px-3 space-y-4 overflow-auto z-10">
        <x-sidebar.dropdown :border="true" :active="$active_page == 'profile'">
            <x-slot name="minified">
                <img class="h-10 w-10 rounded-full shadow-md" src="{{ asset('storage/user_avatars/avatar.png') }}" alt="{{ __('User Avatar') }}">
            </x-slot>

            <x-slot name="title">
                {{ auth()->user()->name }}
            </x-slot>

            <x-slot name="list">
                <x-sidebar.subaction :active="$active_page == 'profile'" minified="MP" action="My Profile" href="{{ route('users.show') }}"/>
                <x-sidebar.logout minified="LG" action="Logout"/>
            </x-slot>
        </x-sidebar.dropdown>
        <x-sidebar.dropdown class="py-2" :active="in_array($active_page, ['roles', 'users'])" :border="false">
            <x-slot name="minified">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </x-slot>

            <x-slot name="title">
                {{ __('Admin Actions') }}
            </x-slot>

            <x-slot name="list">
                <x-sidebar.subaction :active="$active_page == 'roles'" minified="RL" action="Role Management" href="#"/>
                <x-sidebar.subaction :active="$active_page == 'users'" minified="US" action="User Management" href="{{ route('users.index') }}"/>
            </x-slot>
        </x-sidebar.dropdown>
    </div>
</div>
