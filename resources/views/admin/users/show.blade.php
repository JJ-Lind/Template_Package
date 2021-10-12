@extends('layouts.app', [
    'active_page' => 'profile',
    'page_title' => __('My Profile')
])

@section('content')
    @livewire('profile')
@endsection
