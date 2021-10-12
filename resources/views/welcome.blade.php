@extends('layouts.app', [
    'active_page' => 'categories',
    'page_title' => __('Adjustments')
])

@section('content')
    <div class="flex space-x-4">
        <x-card>
            <x-slot name="title">
                Header
            </x-slot>
            <x-slot name="actions">
                <x-button>Action 1</x-button>
                <x-button>Action 2</x-button>
            </x-slot>
            <x-slot name="body">
                Body
            </x-slot>
            <x-slot name="footer">
                <x-button>Action 1</x-button>
                <x-button>Action 2</x-button>
            </x-slot>
        </x-card>
    </div>
@endsection
