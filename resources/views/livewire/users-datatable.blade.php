<div>
    @livewire('flash-container')
    <x-datatables.card>
        <x-slot name="title">
            {{ __('Users') }}
        </x-slot>
        <x-slot name="actions">
            @can('create users')<x-button class="bg-green-500 text-white" wire:click="confirmAction('create')">{{ __('Create User') }}</x-button>@endcan
            @can('assign roles', 'delete users')
            <div class="relative" x-data="{ show:false }">
                <x-button class="bg-indigo-600 text-white" @click="show = !show">{{ __('Bulk-Actions') }}</x-button>
                <div class="absolute top-10 right-0 left-auto flex flex-col space-y-2 p-2 min-w-10 bg-white border border-gray-200 shadow-md rounded-sm" x-show="show" @click.outside="show = false" x-cloak x-transition>
                    @can('delete users')
                    <a class="block flex justify-content-between w-full p-2 whitespace-nowrap text-left cursor-pointer transition-all" wire:click="confirmAction('delete')">
                        <div class="w-1/6 mr-2 flex items-center whitespace-nowrap text-red-600 hover:text-red-800"><x-icons.x-circle class="h-4 w-4"/></div>
                        <div class="w-5/6 flex items-center whitespace-nowrap hover:text-red-800">{{ __('Delete Users') }}</div>
                    </a>
                    @endcan
                    @can('assign roles')
                    <a class="block flex justify-content-between w-full p-2 whitespace-nowrap text-left cursor-pointer transition-all" wire:click="confirmAction('role')">
                        <div class="w-1/6 mr-2 flex items-center whitespace-nowrap text-indigo-600 hover:text-indigo-800"><x-icons.fingerprint class="h-4 w-4"/></div>
                        <div class="w-5/6 flex items-center whitespace-nowrap hover:text-indigo-800">{{ __('Assign Roles') }}</div>
                    </a>
                    @endcan
                </div>
            </div>
            @endcan
        </x-slot>
        <x-slot name="body">
            <div class="flex h-16 w-full mb-4 p-2 space-x-4">
                <div class="flex shadow-sm w-1/2">
                  <label class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="search">{{ __('Search') }}</label>
                  <input class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="search" type="text" wire:model.debounce.300ms="search">
                </div>
                <div class="flex shadow-sm w-1/4">
                    <label class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="sortField">{{ __('Sort By') }}</label>
                    <select class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="sortField" wire:model="sort_field">
                        <option value="name">{{ __('Name') }}</option>
                        <option value="last_login">{{ __('Last Login') }}</option>
                    </select>
                </div>
                <div class="flex shadow-sm">
                    <label class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="sortAsc">{{ __('Sort Direction') }}</label>
                    <select class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="sortAsc" wire:model="sort_asc">
                        <option value="asc">{{ __('Ascending') }}</option>
                        <option value="desc">{{ __('Descending') }}</option>
                    </select>
                </div>
                <div class="flex shadow-sm w-40">
                    <label class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="perPage">{{ __('Results') }}</label>
                    <select class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="perPage" wire:model="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="1000000">{{ __('All') }}</option>
                    </select>
                </div>
            </div>
            <x-datatable>
                <x-slot name="header">
                    <tr>
                        <x-datatables.header class="w-24" label="{{ __('Select') }}"/>
                        <x-datatables.header class="w-4/12 pl-20 text-left" label="{{ __('Name') }}"/>
                        <x-datatables.header class="text-left" label="{{ __('Role') }}"/>
                        <x-datatables.header class="w-3/12 text-left" label="{{ __('Last Login') }}"/>
                        <x-datatables.header class="text-right" label="{{ __('Actions') }}"/>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @forelse($users as $user)
                        <tr>
                            <td class="flex justify-center px-6 py-4 space-x-2 whitespace-nowrap text-sm font-medium">
                                <label class="sr-only" for="user[{{ $user['id'] }}]">{{ __('Select user') . ': ' . $user['id'] }}</label>
                                <input class="h-4 w-4 text-indigo-600 border-gray-400 rounded focus:ring-indigo-500" id="user[{{ $user['id'] }}]" type="checkbox" wire:model.defer="selected" value="{{ $user['id'] }}"/>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $user['avatar'] }}" alt="{{ __('User Avatar') }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900">
                                            {{ $user['name'] }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $user['email'] }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user['roles'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user['last_login'] }}
                            </td>
                            <td class="flex justify-end px-6 py-4 space-x-2 whitespace-nowrap text-sm font-medium">
                                @if($user['id'] != auth()->user()->id && auth()->user()->can('assign roles'))
                                    <a class="block flex justify-center items-center w-8 h-8 bg-indigo-500 hover:bg-indigo-400 rounded-md cursor-pointer transition ease-in-out duration-300 text-white" wire:click="confirmAction('role', {{ $user['id'] }})">
                                        <x-icons.fingerprint class="h-4 w-4"/>
                                    </a>
                                @endif
                                @if($user['id'] == auth()->user()->id)
                                    <a class="block flex justify-center items-center w-8 h-8 bg-green-500 hover:bg-green-400 rounded-md cursor-pointer transition ease-in-out duration-300 text-white">
                                        <x-icons.pencil class="h-4 w-4"/>
                                    </a>
                                @endif
                                @if($user['id'] != auth()->user()->id && auth()->user()->can('delete users'))
                                    <a class="block flex justify-center items-center w-8 h-8 bg-red-600 hover:bg-red-500 rounded-md cursor-pointer transition ease-in-out duration-300 text-white" wire:click="confirmAction('delete', {{ $user['id'] }})">
                                        <x-icons.x class="h-4 w-4"/>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="flex justify-center items-center h-24 w-full">
                            <td>{{ __('Whoops! Nothing to show, sorry!') }}</td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-datatable>
        </x-slot>
        <x-slot name="footer">
            {{ $users->links('livewire.pagination') }}
        </x-slot>
    </x-datatables.card>
    @can('create users')
        <x-modals.modal modal="show_create_modal" wire:model.defer="show_create_modal">
        <x-slot name="icon">
            <x-icons.cog class="h-6 w-6 text-green-600"/>
        </x-slot>
        <x-slot name="header">
            {{ __('Create User') }}
        </x-slot>
        <x-slot name="body">
            <div class="flex shadow-sm">
              <label class="inline-flex items-center w-16 px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="name">{{ __('Name') }}</label>
              <input class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" type="text" wire:model.lazy="name">
            </div>
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <div class="flex shadow-sm mt-2">
              <label class="inline-flex items-center w-16 px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="email">{{ __('Email') }}</label>
              <input class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="email" type="email" wire:model.lazy="email">
            </div>
            @error('email') <span class="error">{{ $message }}</span> @enderror
            <div class="flex shadow-sm mt-2">
                <label class="inline-flex items-center w-16 px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-sm text-gray-500" for="selected_role">{{ __('Role') }}</label>
                <select class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500" id="selected_role" wire:model="selected_role">
                    <option value="" selected>{{ __('Select a Role') }}</option>
                    @foreach($roles as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            @error('selected_role') <span class="error">{{ $message }}</span> @enderror

        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="$set('show_create_modal', false)">{{ __('Cancel') }}</x-button>
            <x-button class="bg-green-500 hover:bg-green-600 text-white" wire:loading.class="cursor-disabled" wire:click="createUser">
                <svg wire:loading wire:target="createUser" class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:target="createUser" wire:loading.remove>{{ __('Create') }}</span>
                <span wire:target="createUser" wire:loading>{{ __('Processing') }}</span>
            </x-button>
        </x-slot>
    </x-modals.modal>
    @endcan

    @can('assign roles')
        <x-modals.modal modal="show_role_modal" wire:model.defer="show_role_modal">
        <x-slot name="icon">
            <x-icons.fingerprint class="h-6 w-6 text-indigo-600"/>
        </x-slot>
        <x-slot name="header">
            {{ __('Assign Role') }}
        </x-slot>
        <x-slot name="body">
            <p class="text-gray-500">{{ __('Are you sure you want to assign a role to') . ':' }}</p>
            <ul class="pl-6 py-4 list-disc">
                @if(!empty($selected_user))
                    <li>{{ $selected_user['name'] }}</li>
                @else
                    @foreach($selected_users as $user)
                        <li>{{ $user['name'] }}</li>
                    @endforeach
                @endif
            </ul>
            <x-forms.select name="selected_role" label="{{ __('Roles') }}" wire:model="selected_role">
                <x-slot name="options">
                    <option value="" selected>{{ __('Select a Role') }}</option>
                    @foreach($roles as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-slot>
            </x-forms.select>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="$set('show_role_modal', false)">{{ __('Cancel') }}</x-button>
            <x-button class="bg-indigo-500 hover:bg-indigo-600 text-white" wire:loading.class="cursor-disabled" wire:click="assignRole">
                <svg wire:loading wire:target="assignRole" class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:target="assignRole" wire:loading.remove>{{ __('Assign') }}</span>
                <span wire:target="assignRole" wire:loading>{{ __('Processing') }}</span>
            </x-button>
        </x-slot>
    </x-modals.modal>
    @endcan

    @can('delete users')
        <x-modals.modal modal="show_delete_modal" wire:model.defer="show_delete_modal">
        <x-slot name="icon">
            <x-icons.warning class="h-6 w-6 text-red-600"/>
        </x-slot>
        <x-slot name="header">
            {{ __('Delete') . ' ' }}
            @if(!empty($selected_user))
                {{ (optional($selected_user))->name }}
            @else
                {{ count($selected_users) . ' ' . __('Users') }}
            @endif
        </x-slot>
        <x-slot name="body">
            <p class="text-gray-500">{{ __('Are you sure you want to permanently delete') . ':' }}</p>
            <ul class="pl-6 py-4 list-disc">
                @if(!empty($selected_user))
                    <li>{{ $selected_user['name'] }}</li>
                @else
                    @foreach($selected_users as $user)
                        <li>{{ $user['name'] }}</li>
                    @endforeach
                @endif
            </ul>
        </x-slot>
        <x-slot name="footer">
            <x-button wire:click="$set('show_delete_modal', false)">{{ __('Cancel') }}</x-button>
            <x-button class="bg-red-500 hover:bg-red-600 text-white" wire:loading.class="cursor-disabled" wire:click="deleteUsers">
                <svg wire:loading wire:target="deleteUsers" class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:target="deleteUsers" wire:loading.remove>{{ __('Delete') }}</span>
                <span wire:target="deleteUsers" wire:loading>{{ __('Processing') }}</span>
            </x-button>
        </x-slot>
    </x-modals.modal>
    @endcan
</div>
