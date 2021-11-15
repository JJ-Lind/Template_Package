@extends('layouts.app', [
    'active_page' => 'users',
    'breadcrumbs' => [__('Manage Users') => route('users.index')]
])

@section('content')
    @livewire('users-datatable')
@endsection
