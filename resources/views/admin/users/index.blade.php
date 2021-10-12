@extends('layouts.app', [
    'active_page' => 'users',
    'page_title' => __('Manage Users')
])

@section('content')
    @livewire('users-datatable')
@endsection
